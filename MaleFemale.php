<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 12.35
 */

require 'Person.php';

class MaleFemale extends Person
{
    private $birthDate;
    private $salary;

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$p = new MaleFemale();
$p->setID('kruno');
$p->getId();
var_dump($p);