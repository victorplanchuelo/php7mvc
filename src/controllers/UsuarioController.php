<?php

namespace Php7MVC\controllers;

use Php7MVC\models\Usuario;

class UsuarioController{
    public function index() {
        echo "Estoy en el controlador de Usuario";
    }

    public function register() {
        require_once "src/views/usuario/registro.php";
    }

    public function save()
    {
        return "Llega";
        if(isset($_POST))
        {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $result = $usuario->save();
            if($result)
            {
                echo "Se ha guardado correctamente el usuario";
            }
        }
    }
}
