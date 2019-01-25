<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 12.21
 */


abstract class Person
{
    protected $id;
    private $firstName;
    private $lastName;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }



}