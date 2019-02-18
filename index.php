<?php
namespace Php7MVC;

session_start();

require 'vendor/autoload.php';
require_once 'src/views/layout/header.php';
require_once 'src/views/layout/sidebar.php';

use Php7MVC\controllers as controlador;

function show_error() {
    $error = new controlador\ErrorController;
    $error->index();
}

if(!isset($_GET['c']) && !isset($_GET['a']))
{
    $controller_name = "Php7MVC\controllers\\{CONTROLLER_DEFAULT}";
    $action = "{ACTION_DEFAULT}";
}
else {
    if(isset($_GET['c'])) {
        $controller_name = "Php7MVC\controllers\\" . ucwords($_GET['c']) . "Controller";
    }
    else {
        show_error();
    }

    if(class_exists($controller_name))
    {

        $controller = new $controller_name;
        $action = strtolower($_GET['a']);
        if(isset($action) && method_exists($controller, $action)) {
            $controller->$action();
        }
        else {
            show_error();
        }
    }
    else {
        show_error();
    }
}

require_once 'src/views/layout/footer.php';
