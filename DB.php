<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 1.21
 */

require 'getDB.php';

class DB
{
    private $PDO;



    public function __construct()
    {
        try {
            $this->PDO = new PDO(
                'mysql:host=' . getDB::getDBvalues('host') . ';
                dbname=' . getDB::getDBvalues('dbname'),
                getDB::getDBvalues('user'),
                getDB::getDBvalues('password'));
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
        echo "connected";
    }
}


$DB = new DB;


