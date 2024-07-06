
<?php

class Conn {
    private $dsn;
    private $usuario;
    private $pass;
    private $conexion;

    public function __construct() {
        $this->dsn = "mysql:host=localhost;dbname=bisuteria";
        $this->usuario = "root";
        $this->pass = "";
    }

    public function conectar() {
        try {
            $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            return null;
        }
    }

    public function cerrar() {
        $this->conexion = null;
    }
}
