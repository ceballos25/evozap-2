<?php

//utilizamos la clase conexion
class Conexion {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Hubo un error al conectar con la base de datos, contacte al administrador: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
