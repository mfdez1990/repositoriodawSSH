<?php
namespace Src\System;

class DatabaseConnector {

    /**
    * @access private
    * @var $db
    */
    private $dbConnection = null;

    /**
    * Constructor de la clase DatabaseConnector.php
    * Obtiene los datos para la conexión a la base de datos mediante la función getenv() del fichero .env
    * Intenta generar la conexión a la base de datos pasando a la función \PDO los tres @param $url, $user string, $pass con los datos
    * obtenidos anteriormente.
    */

    public function __construct()
    {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $db   = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
    * Funcionalidad Getter se encaraga de acceder al atributo y devolverlo
    * @return $dbConnection
    */

    public function getConnection()
    {
        return $this->dbConnection;
    }
}