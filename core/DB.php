<?php

class DB
{
    protected $connection;
    protected $table;
    protected $sql = '';
    protected $where = [];

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



    public function table($table)
    {
        $this->reset();

        $this->table = $table;

        return $this;
    }



    public function select($columns = '*')
    {
        $this->sql = "SELECT {$columns} FROM {$this->table}";

        return $this;
    }



    public function where($column, $operator, $value)
    {
        $value = $this->escape($value);

        if (empty($this->where)) {
            $this->where[] = "WHERE {$column} {$operator} '{$value}'";
        } else {
            $this->where[] = "AND {$column} {$operator} '{$value}'";
        }

        return $this;
    }


    public function orWhere($column, $operator, $value)
    {
        $value = $this->escape($value);

        if (empty($this->where)) {
            $this->where[] = "WHERE {$column} {$operator} '{$value}'";
        } else {
            $this->where[] = "OR {$column} {$operator} '{$value}'";
        }

        return $this;
    }



    public function get()
    {
        if (empty($this->sql)) {
            $this->sql = "SELECT * FROM {$this->table}";
        }

        $this->sql .= ' ' . implode(' ', $this->where);

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query->fetch_all(MYSQLI_ASSOC);
    }



    public function first()
    {
        if (empty($this->sql)) {
            $this->sql = "SELECT * FROM {$this->table}";
        }

        $this->sql .= ' ' . implode(' ', $this->where);

        $this->sql .= " LIMIT 1";

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query->fetch_assoc();
    }


    public function insert($data)
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


    public function update($data)
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



    public function delete()
    {
        $this->sql = "DELETE FROM {$this->table}";

        $this->sql .= ' ' . implode(' ', $this->where);

        $query = $this->connection->query($this->sql);

        $this->reset();

        return $query;
    }


    public function count($column = '*')
    {
        $this->sql = "SELECT COUNT({$column}) as total FROM {$this->table}";

        return $this;
    }



    public function query($sql)
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

    public function join($table, $condition, $type = 'INNER')
    {
        $this->sql .= " {$type} JOIN {$table} ON {$condition}";
        return $this;
    }

    public function leftJoin($table, $condition)
    {
        return $this->join($table, $condition, 'LEFT');
    }

    public function rightJoin($table, $condition)
    {
        return $this->join($table, $condition, 'RIGHT');
    }

    public function fullJoin($table, $condition)
    {
        return $this->join($table, $condition, 'FULL');
    }

    public function groupBy($column)
    {
        $this->sql .= " GROUP BY {$column}";
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->sql .= " ORDER BY {$column} {$direction}";
        return $this;
    }

    public function limit(int $limit)
    {
        $this->sql .= " LIMIT {$limit} ";
        return $this;
    }

    public function offset(int $offset)
    {
        $this->sql .= " OFFSET {$offset} ";
        return $this;
    }

    public function paginate($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        if (empty($this->sql)) {
            $this->sql = "SELECT * FROM {$this->table}";
        }

        $this->sql .= ' ' . implode(' ', $this->where);



        $this->limit($limit);
        $this->offset($offset);

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
        $this->sql .= ' ' . implode(' ', $this->where);

        return $this->sql;
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
