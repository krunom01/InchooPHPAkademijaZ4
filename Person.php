<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 12.21
 */


class Person{

    private $firstName;
    private $lastName;
    public static $id = 0;

    public function __construct($firstName, $lastName ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        self::$id++;
    }
}

$p = new Person("kruno","marijanovic");
echo Person::$id;
$p = new Person("asd","asd");
echo Person::$id;
$p = new Person("asd","asd");
echo Person::$id;
var_dump($p);


