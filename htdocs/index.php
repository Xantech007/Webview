<?php
/*
|--------------------------------------------------------------------------
| FRONT CONTROLLER
|--------------------------------------------------------------------------
| Single entry point for the entire application
|--------------------------------------------------------------------------
*/

session_start();

/*
|--------------------------------------------------------------------------
| BASE PATH
|--------------------------------------------------------------------------
*/

define('BASE_PATH', dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| AUTOLOAD CORE CLASSES
|--------------------------------------------------------------------------
*/

require_once BASE_PATH . '/app/core/Controller.php';
require_once BASE_PATH . '/app/core/Model.php';
require_once BASE_PATH . '/config/database.php';

/*
|--------------------------------------------------------------------------
| LOAD CONTROLLERS
|--------------------------------------------------------------------------
*/

require_once BASE_PATH . '/app/controllers/AuthController.php';
require_once BASE_PATH . '/app/controllers/DashboardController.php';
require_once BASE_PATH . '/app/controllers/TaskController.php';
require_once BASE_PATH . '/app/controllers/WalletController.php';

/*
|--------------------------------------------------------------------------
| SIMPLE ROUTER
|--------------------------------------------------------------------------
*/

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
$uri = $uri === '' ? '/' : $uri;

/*
|--------------------------------------------------------------------------
| ROUTES
|--------------------------------------------------------------------------
*/

switch ($uri) {

    /*
    |--------------------------------------------------------------------------
    | AUTH ROUTES
    |--------------------------------------------------------------------------
    */

    case '/login':
        (new AuthController())->login();
        break;

    case '/loginPost':
        (new AuthController())->loginPost();
        break;

    case '/register':
        (new AuthController())->register();
        break;

    case '/registerPost':
        (new AuthController())->registerPost();
        break;

    case '/logout':
        (new AuthController())->logout();
        break;


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    case '/':
    case '/dashboard':
        (new DashboardController())->index();
        break;


    /*
    |--------------------------------------------------------------------------
    | TASK ROUTES
    |--------------------------------------------------------------------------
    */

    case '/task':
        (new TaskController())->index();
        break;

    case '/task/complete':
        (new TaskController())->complete();
        break;


    /*
    |--------------------------------------------------------------------------
    | WALLET ROUTES
    |--------------------------------------------------------------------------
    */

    case '/deposit':
        (new WalletController())->deposit();
        break;

    case '/depositPost':
        (new WalletController())->depositPost();
        break;

    case '/withdraw':
        (new WalletController())->withdraw();
        break;

    case '/withdrawPost':
        (new WalletController())->withdrawPost();
        break;


    /*
    |--------------------------------------------------------------------------
    | 404
    |--------------------------------------------------------------------------
    */

    default:
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        break;
}
