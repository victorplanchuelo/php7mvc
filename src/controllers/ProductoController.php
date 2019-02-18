<?php

namespace Php7MVC\controllers;

use PDO;

class ProductoController{
    public function index() {
        require_once 'src/views/producto/destacados.php';
    }
}
