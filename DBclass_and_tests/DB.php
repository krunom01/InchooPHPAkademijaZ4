<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 1.21
 */


class DB
{
    private static $instance = null;
    private $PDO;
    private $host = 'localhost';
    private $dbname = 'employee';
    private $username = 'kruno';
    private $password = 'kruno031';

    public function __construct()
    {
        $this->PDO = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
    }

    public static function instance()
    {
        if (!self::$instance) { //check if class DB is already created,if not,create new one.
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function connection()
    {
        return $this->PDO;
    }

}




