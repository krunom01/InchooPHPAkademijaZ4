<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 12.21
 */


class Person
{
    protected static $instances = 0;
    private $id = null;
    private $firstName;
    private $lastName;



    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = ++self::$instances;
    }


}


function createPerson($name, $lastname)
{
    $person = new Person($name, $lastname);
    var_dump($person);

}



