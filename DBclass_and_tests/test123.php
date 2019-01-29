<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 27/01/19
 * Time: 21.28
 */

/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 12.21
 */
error_reporting(E_ALL);

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
    public function __toString()
    {
        return $this->id . ' '. $this->firstName . ' ' . $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}


class Collection
{
    public $items = array();

    public function addItem($obj)
    {

        $this->items[] = $obj;
    }


}




$c=new Collection();
function setPerson ($name,$lastName){
    $GLOBALS['c']->addItem(new Person($name, $lastName));
}




function getAllEmployees()
{
    foreach ($GLOBALS['c'] as $key => $val) {
        foreach ($val as $subkey => $subval) {
            echo $subval->getLastName();
            echo $subval->getId();
        }
    }
}






