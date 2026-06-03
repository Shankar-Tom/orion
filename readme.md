## Orion PHP MVC
Lighweight PHP MVC framework


# How to use this MVC

1. Download this repository
2. Extract the repository to a folder
3. Open terminal or command prompt and navigate to the root folder of the project
4. Run `composer dump-autoload` to create autoload files
5. Create a new database and update the `config.php` file in the `core` folder with your database credentials
6. Run `php orion start` to start the application

Note: This is a lightweight PHP framework and does not include features such as routing, database migrations, and session management. You may need to add these features depending on your project requirements.

# Features
- Routing
- Database migrations
- Session management
- Authentication
- Views
- Cli 

You can use this framework to build any PHP application.


In routes.php you can define routes like this:
```php
Route::get('/', 'HomeController','index');
```
Then in controller HomeController.php you can define methods like this:
```php
<?php
use core\Response;
class HomeController {
    public function index() {
        Response::view('home',['data'=>'data']);
    }
}
```

In views/home.php you can define views like this:
```php
<html>
    <body>
        <h1><?php echo $data; ?></h1>
    </body>
</html>
```

OR for Json Response you can use 

```php
<?php
use core\Response;
class HomeController {
    public function index() {
        Response::json(['data'=>'data']);
    }
}
```


To use DB functions you can use 
```php
<?php
use core\DB;
class HomeController {
    public function index() {
       $users= DB::table('users')->select('*')->get();
       Response::view('home',['users'=>$users]);
    }
}
```

For more DB functions check the DB class in the core folder.

To use auth 

```php
<?php
use core\Auth;
class HomeController {
    public function index() {
       if(Auth::login('table',['field'=>'field1','field2'=>'field2'],'password')) {
             redirect('/dashboard');
           // Redirect to dashboard or home page
       }
    }
}
```


## Database

`Core\DB` is a fluent query builder backed by MySQLi. Every query starts with `DB::table('table_name')` and is chained to completion.

### Configuration

Edit `core/config.php` with your database credentials. `DB` reads this file automatically on construction:

```php
<?php
// core/config.php
return [
    'database' => [
        'host'     => 'localhost',
        'name'     => 'your_database',
        'user'     => 'your_username',
        'password' => 'your_password',
    ]
];
```

---

### Migrations

Orion uses a migration system to version-control your database schema.

**Create a new migration:**

```bash
php orion create:table users create
php orion create:table posts create
```

This generates a migration file in `migrations/`. Open it to define your table schema, then run:

```bash
php orion generate:tables
```

---

### Selecting Records

```php
use Core\DB;

// Fetch all rows from a table
$users = DB::table('users')->get();

// Select specific columns
$users = DB::table('users')->select('id, name, email')->get();

// Fetch a single row (adds LIMIT 1 automatically)
$user = DB::table('users')->where('id', '=', $id)->first();
```

---

### Where Clauses

```php
use Core\DB;

// Single condition
$admins = DB::table('users')
    ->where('role', '=', 'admin')
    ->get();

// Multiple AND conditions — chain where() calls
$result = DB::table('orders')
    ->where('status', '=', 'active')
    ->where('total', '>', '100')
    ->get();

// OR condition
$result = DB::table('users')
    ->where('role', '=', 'admin')
    ->orWhere('role', '=', 'moderator')
    ->get();
```

---

### Insert

```php
use Core\DB;

DB::table('users')->insert([
    'name'     => 'John Doe',
    'email'    => 'john@example.com',
    'password' => password_hash('secret', PASSWORD_BCRYPT),
]);

// Get the ID of the newly inserted row
$db = DB::table('users');
$db->insert(['name' => 'Jane', 'email' => 'jane@example.com', 'password' => '...']);
$newId = $db->insertId();
```

---

### Update

```php
use Core\DB;

DB::table('users')
    ->where('id', '=', $id)
    ->update(['name' => 'Updated Name', 'email' => 'new@example.com']);

// Check how many rows were affected
$db = DB::table('users');
$db->where('status', '=', 'inactive')->update(['status' => 'active']);
$affected = $db->updatedRows();
```

---

### Delete

```php
use Core\DB;

DB::table('users')
    ->where('id', '=', $id)
    ->delete();
```

---

### Count

```php
use Core\DB;

// Count all rows
$total = DB::table('users')->count();

// Count a specific column (ignores NULLs)
$total = DB::table('orders')->count('id');
```

---

### Ordering, Limiting & Offset

```php
use Core\DB;

$users = DB::table('users')
    ->orderBy('created_at', 'DESC')
    ->limit(10)
    ->offset(20)
    ->get();
```

---

### Joins

```php
use Core\DB;

// INNER JOIN (default)
$results = DB::table('orders')
    ->select('orders.id, users.name, orders.total')
    ->join('users', 'orders.user_id = users.id')
    ->get();

// LEFT JOIN
$results = DB::table('posts')
    ->leftJoin('comments', 'posts.id = comments.post_id')
    ->get();

// RIGHT JOIN
$results = DB::table('users')
    ->rightJoin('profiles', 'users.id = profiles.user_id')
    ->get();

// FULL JOIN
$results = DB::table('a')
    ->fullJoin('b', 'a.id = b.a_id')
    ->get();
```

---

### Group By

```php
use Core\DB;

$stats = DB::table('orders')
    ->select('status, COUNT(*) as total')
    ->groupBy('status')
    ->get();
```

---

### Pagination

`paginate()` returns an object with the current page's data, the total page count, and the current page number:

```php
use Core\DB;

$page   = $_GET['page'] ?? 1;
$result = DB::table('posts')
    ->orderBy('created_at', 'DESC')
    ->paginate($page, 10);   // page number, items per page

$posts        = $result->data;          // array of rows
$totalPages   = $result->page_count;

```

---

### Raw Queries

For complex SQL that doesn't fit the builder, use `query()` directly:

```php
use Core\DB;

$db     = DB::table('users');   // or: new \Core\DB()
$result = $db->query("SELECT * FROM users WHERE created_at > '2024-01-01'");
$rows   = $result->fetch_all(MYSQLI_ASSOC);
```

---

### Debug: Inspect the Generated SQL

```php
use Core\DB;

$sql = DB::table('users')
    ->select('id, name')
    ->where('active', '=', '1')
    ->orderBy('name', 'ASC')
    ->toSql();

echo $sql;
// SELECT id, name FROM users WHERE active = '1'  ORDER BY name ASC
```

---

### DB Method Reference

| Method | Description |
|--------|-------------|
| `DB::table(string $table)` | Start a new query on the given table |
| `select(string $columns)` | Specify columns to retrieve (default `*`) |
| `where($col, $op, $val)` | Add a `WHERE … AND` condition |
| `orWhere($col, $op, $val)` | Add a `WHERE … OR` condition |
| `get()` | Execute and return all matching rows |
| `first()` | Execute and return the first matching row |
| `insert(array $data)` | Insert a row; returns `bool` |
| `insertId()` | Get the last inserted auto-increment ID |
| `update(array $data)` | Update rows matching the current `WHERE` clause |
| `updatedRows()` | Number of rows affected by the last `update()` |
| `delete()` | Delete rows matching the current `WHERE` clause |
| `count(string $col = '*')` | Return a count of matching rows |
| `join($table, $condition)` | INNER JOIN |
| `leftJoin($table, $condition)` | LEFT JOIN |
| `rightJoin($table, $condition)` | RIGHT JOIN |
| `fullJoin($table, $condition)` | FULL JOIN |
| `groupBy(string $column)` | Add a `GROUP BY` clause |
| `orderBy($col, $dir = 'ASC')` | Add an `ORDER BY` clause |
| `limit(int $n)` | Limit the number of results |
| `offset(int $n)` | Skip the first `n` results |
| `paginate($page, $limit)` | Paginate results; returns `{data, page_count, current_page}` |
| `query(string $sql)` | Execute a raw SQL string |
| `toSql()` | Return the final SQL string without executing it |

## Background  Jobs

To generate a backgound job, run the following command:

```bash
php orion create:class Jobs\JobClass
```

The job class will be created in the `app/jobs/` directory.

Then in Job Class define handle function 

```php
<?php 
public function handle()
{
    // Your job logic here
}
```




## Queue Worker

Orion includes a background queue worker for processing deferred jobs:

```bash
php orion queue
```

Jobs can be dispatched from controllers and are processed asynchronously by the worker running in `app/commands/queue_worker.php`.

---

## CLI Commands

All commands are run via the `orion` CLI script:

```bash
php orion <command>
```

| Command | Description |
|--------|-------------|
| `start` | Start the development server at `127.0.0.1:8000` |
| `queue` | Start the background queue worker |
| `create:controller <name>` | Scaffold a new controller in `app/controllers/` |
| `create:table <name> <action>` | Create a new database migration file |
| `generate:tables` | Run all pending database migrations |
| `create:class <name>` | Create a new generic PHP class |

---

## License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.

---

> Built with ❤️ by [Shankar-Tom](https://github.com/Shankar-Tom)



