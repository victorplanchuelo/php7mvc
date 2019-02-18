<?php

namespace Php7MVC\models;

use Php7MVC\config\Database;

class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }


    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $this->db->real_escape_string($rol);
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function save() {
        $sql = "INSERT INTO usuarios(nombre,apellidos,email,password,rol,imagen) SET (:nombre, :apellidos, :email, :password, 'user', null)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":nombre", $this->getNombre(), PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $this->getApellidos(), PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(":password", $this->getPassword(), PDO::PARAM_STR);

        $result = false;
        if ($stmt->execute()) {
            $result = true;
        }
        return $result;
    }

}
