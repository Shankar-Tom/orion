<?php

class DB
{
    protected mysqli $connection;
    protected string $table;
    protected string $sql = '';
    protected array $where = [];
    protected array $join = [];
    protected array $having = [];
    protected array $groupBy = [];
    protected array $orderBy = [];
    protected array $limit = [];
    protected array $offset = [];

    public function __construct()
    {
        $config = require 'config.php';

        $this->connection = new mysqli(
            $config['database']['host'],
            $config['database']['user'],
            $config['database']['password'],
            $config['database']['name']
        );

        if ($this->connection->connect_error) {
            die("Database Connection Failed: " . $this->connection->connect_error);
        }
    }



    public static function table(string $table)
    {
        $instance = new self();
        $instance->reset();
        $instance->table = $table;

        return $instance;
    }



    public function select($columns = '*')
    {
        $this->sql = "SELECT {$columns} FROM {$this->table}";

        return $this;
    }



    public function where(string $column, string $operator, string $value): self
    {
        $value = $this->escape($value);

        if (empty($this->where)) {
            $this->where[] = "WHERE {$column} {$operator} '{$value}'";
        } else {
            $this->where[] = "AND {$column} {$operator} '{$value}'";
        }

        return $this;
    }


    public function orWhere(string $column, string $operator, string $value): self
    {
        $value = $this->escape($value);
        $this->where[] = "OR {$column} {$operator} '{$value}'";

        return $this;
    }



    public function get()
    {
        if (empty($this->sql)) {
            $this->select('*');
        }

        $this->buildSql();
        $query = $this->connection->query($this->sql);
        $this->reset();

        return $query->fetch_all(MYSQLI_ASSOC);
    }



    public function first()
    {
        if (empty($this->sql)) {
            $this->select('*');
            $this->limit(1);
        }

        $this->buildSql();

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query->fetch_assoc();
    }


    public function insert(array $data): bool
    {
        $columns = implode(',', array_keys($data));

        $values = array_map(function ($value) {
            return "'" . $this->escape($value) . "'";
        }, array_values($data));

        $values = implode(',', $values);

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $query = $this->connection->query($sql);

        return $query;
    }

    public function insertId(): int
    {
        return $this->connection->insert_id;
    }


    public function update(array $data): bool
    {
        $fields = [];

        foreach ($data as $column => $value) {
            $fields[] = "{$column}='" . $this->escape($value) . "'";
        }

        $fields = implode(',', $fields);

        $this->sql = "UPDATE {$this->table} SET {$fields}";

        $this->sql .= ' ' . implode(' ', $this->where);

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query;
    }

    public function updatedRows(): int
    {
        return $this->connection->affected_rows;
    }



    public function delete(): bool
    {
        $this->sql = "DELETE FROM {$this->table}";

        $this->sql .= ' ' . implode(' ', $this->where);

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query;
    }


    public function count($column = '*')
    {
        if (empty($this->sql)) {
            $this->select("COUNT({$column}) as {$this->table}_total");
        }

        $this->buildSql();
        $query = $this->connection->query($this->sql);
        $this->reset();

        return $query->fetch_assoc()[$this->table . '_total'];
    }



    public function query(string $sql): bool|mysqli_result
    {
        $query = $this->connection->query($sql);

        return $query;
    }



    protected function escape(string $value): string
    {
        return $this->connection->real_escape_string($value);
    }


    protected function reset()
    {
        $this->sql = '';
        $this->where = [];
    }

    public function join(string $table, string $condition, string $type = 'INNER')
    {
        $this->join[] = "{$type} JOIN {$table} ON {$condition}";
        return $this;
    }

    public function leftJoin(string $table, string $condition)
    {
        return $this->join($table, $condition, 'LEFT');
    }

    public function rightJoin(string $table, string $condition)
    {
        return $this->join($table, $condition, 'RIGHT');
    }

    public function fullJoin(string $table, string $condition)
    {
        return $this->join($table, $condition, 'FULL');
    }

    public function groupBy(string $column)
    {
        $this->groupBy[] = "GROUP BY {$column}";
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC')
    {
        $this->orderBy[] = "{$column} {$direction}";
        return $this;
    }

    public function limit(int $limit)
    {
        $this->limit[] = "LIMIT {$limit}";
        return $this;
    }

    public function offset(int $offset)
    {
        $this->offset[] = "OFFSET {$offset}";
        return $this;
    }

    public function paginate($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;


        $this->limit($limit);
        $this->offset($offset);

        $this->buildSql();
        $query = $this->connection->query($this->sql);

        $this->reset();

        return (object)[
            'data' => $query->fetch_all(MYSQLI_ASSOC),
            'page_count' => ceil($query->num_rows / $limit),
            'current_page' => $page
        ];
    }

    public function subquery($query, $alias)
    {
        $this->sql .= " ({$query}) AS {$alias}";
        return $this;
    }

    public function toSql()
    {

        $this->buildSql();
        return $this->sql;
    }

    protected function buildSql()
    {
        $this->sql .= ' ' . implode(' ', $this->where);
        $this->sql .= ' ' . implode(' ', $this->join);
        $this->sql .= ' ' . implode(' ', $this->groupBy);
        $this->sql .= ' ' . implode(' ', $this->orderBy);
        $this->sql .= ' ' . implode(' ', $this->limit);
        $this->sql .= ' ' . implode(' ', $this->offset);

        return $this->sql;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
