## Orion PHP MVC
Lighweight PHP MVC framework


# How to use this MVC

1. Download this repository
2. Extract the repository to a folder
3. Open terminal or command prompt and navigate to the root folder of the project
4. Run `composer install` to install the required dependencies
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



