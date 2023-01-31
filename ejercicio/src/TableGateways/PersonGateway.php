<?php
namespace Src\TableGateways;

class PersonGateway {

    /**
    * @access private
    * @var DatabaseConnection
    */

    private $db = null;

    /**
    * Constructor de la clase PersonGateway.php
    * @param $db base de datos donde vamos a conectarnos
    */

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
    * Funcionalidad que se encarga de procesar la sentencia SQL que muestra a todas las personas.
    * Intenta ejecutar la consulta y convierte el resultado en un array.
    * @return $result 
    */

    public function findAll()
    {
        $statement = "
            SELECT
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                person;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
    * Funcionalidad que se encarga de procesar la sentencia SQL que busca un objeto con el parametro que se pasa en la función.
    * Intenta ejecutar la consulta y convierte el resultado en un array.
    * @param $id int 
    * @return $result 
    */

    public function find($id)
    {
        $statement = "
            SELECT
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                person
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
    * Funcionalidad que se encarga de procesar la sentencia SQL que inserta personas en la base de datos.
    * Intenta ejecutar la consulta completandola con los parametros de la función.
    * @param $input Array asociativo
    * @return $statement int. Devuelve el número de registros que se han insertado.
    */

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO person
                (firstname, lastname, firstparent_id, secondparent_id)
            VALUES
                (:firstname, :lastname, :firstparent_id, :secondparent_id);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'firstparent_id' => $input['firstparent_id'] ?? null,
                'secondparent_id' => $input['secondparent_id'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
    * Funcionalidad que se encarga de procesar la sentencia SQL que actuliza los datos, concatenando los parametros de la función.
    * Intenta ejecutar la consulta completandola con los parametros de la función.
    * @param $id int
    * @param $input Array asociativo
    * @return $statement int. Devuelve el número de registros que se han actualizado.
    */

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE person
            SET
                firstname = :firstname,
                lastname  = :lastname,
                firstparent_id = :firstparent_id,
                secondparent_id = :secondparent_id
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'firstparent_id' => $input['firstparent_id'] ?? null,
                'secondparent_id' => $input['secondparent_id'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
    * Funcionalidad que se encarga de procesar la sentencia SQL que elimina a una persona de la base de datos
    * Intenta ejecutar la consulta completandola con el parametro de la función.
    * @param $id int
    * @return $statement int. Devuelve el número de registros que se han eliminado.
    */

    public function delete($id)
    {
        $statement = "
            DELETE FROM person
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}