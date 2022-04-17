<?php

namespace App\Database;

use \PDO;
use \PDOException;

class Database {
    const HOST = 'localhost';
    const NAME = 'opportunity_crud';
    const USER = 'root';
    const PASSWORD = 'root';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASSWORD);
            // caso algo não saia como esperado o PDO lança uma exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        // MONTA UM ARRAY COM O MESMO NÚMERO DE POSIÇÃO DOS FIELDS, CASO NÃO TENHA POSIÇÕES NOVAS SERÁ PREENCHIDO COM '?'
        $binds  = array_pad([], count($fields), '?');

        // MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields ).') VALUES ('.implode(',', $binds).')';
        
        // EXECUTA O INSERT
        $this->execute($query, array_values($values));

        // RETORNO O ID INSERIDO NO BANCO
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // DADOS DA QUERY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';


        // MONTA A QUERY
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        // EXECUTE A QUERY
        return $this->execute($query);
    }

    public function update($where, $values)
    {
        // DADOS DA QUERY
        $fields = array_keys($values);

        // MONTA QUERY
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . ' =? WHERE ' . $where;

        // EXECUTA A QUERY
        $this->execute($query, array_values($values));

        // RETORNA SUCESSO
        return true;
    }

    public function delete($where)
    {
        // MONTA A QUERY
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        // EXECUTA A QUERY
        $this->execute($query);

        // RETORNA SUCESSO
        return true;
    }
}
