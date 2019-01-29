<?php

/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 27/01/19
 * Time: 19.38
 */



class Collection
{
    public $items = array();


    public function addItem($obj)
    {

        $this->items[] = $obj;
    }

    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]); // brisanje po kljucu
        } else {
            echo 'wrong id!';
        }
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key]; //dohvacanje po kljucu
        } else {
            echo 'wrong id!';
        }
    }


    public function getItems()
    {
        return $this->items;
    }
}

class Person
{
    protected static $instances = -1;
    private $id = null;
    private $firstName;
    private $lastName;
    private $birthDate;
    private $gender;
    private $salary;


    public function __construct($firstName, $lastName, $birthDate, $gender, $salary)
    {
        $this->id = ++self::$instances; // instanca je napravljena iz razloga se ID povećava svakom novom objektu
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
        $this->salary = $salary;

    }


    public function __toString()
    {
        return 'ID: ' . $this->id . ', FirstName: ' . $this->firstName . ', LastName: ' . $this->lastName .
            ', BirthDate: ' . $this->birthDate . ', Gender: ' . $this->gender . ' Salary:  ' . $this->salary;
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

    public function getId()
    {
        return $this->id;
    }


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

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

}

$c = new Collection();

//racunanje prosjeka strosti zaposlenika

//definiranje arraya prije funckije

$days = [];
$salary20 = [];
$salary30 = [];
$salary40 = [];
$salaryOlder = [];
$maleSalary = [];
$femaleSalary = [];


//funkcija koja omoguce pregled i analizu svih zaposlenika putem dvostruke foreach petlje

function statistic($days, $c)
{
    foreach ($c as $key => $val) {
        foreach ($val as $subkey => $subval) {

            $datetime1 = new DateTime($subval->getBirthDate());
            $datetime2 = new DateTime('today');
            $interval = $datetime1->diff($datetime2);
            $days[] = $interval->format('%a') . "<br>"; //dodavanje dana u novi array kako bi iz njega mogao ocitati podatke

            //defiranje starosti svakog pojedinog zaposlenik
            $age = $interval->format('%y');


            //dodavanje podataka u nove nozive kako bi ih kasnije mogao dobiti statistiku za određene uvjete
            if ($age < 20) {
                $salary20[] = $subval->getSalary();
            }
            if ($age >= 20 && $age < 30) {
                $salary30[] = $subval->getSalary();
            }
            if ($age >= 30 && $age < 40) {
                $salary40[] = $subval->getSalary();
            }

            if ($age >= 40) {
                $salaryOlder[] = $subval->getSalary();
            }

            if($subval->getGender() === "M"){
               $maleSalary[] = $subval->getSalary();
            }
            if($subval->getGender() === "F"){
                $femaleSalary[] = $subval->getSalary();
            }

        }
    }
    //računanje prosječne starosti zaposlenika po danima, mjesecima i godinama. koristenje array_suma te intval kako bi broj pretvorio u integer
    if (count($days)) {
        $a = array_filter($days);
        echo "prosječna starost u danima: " . $averageDays = array_sum($a) / count($a) . "<\n>";

        echo "prosječna starost u mjesecima: " . $averageMonths = intval($averageDays) / 12 . "<\n>";

        echo "procječna starost u godinama: " . $averageYears = intval($averageDays) / 365 . "<\n>";

    }
    //provjera jel array prazan tj postoje li određene osobe za te uvjete
    if (empty($salary20)) {
        echo "nema osoba do 20 godina<\n> ";
    } else {
        echo "Ukupna primanja svih osoba do 20 godina: " . array_sum($salary20) . "kn<\n>";
    }
    if (empty($salary30)) {
        echo "nema osoba između 20 i 30 godina<\n> ";
    } else {
        echo "Ukupna primanja svih osoba između 20 i 30 godina: " . array_sum($salary30) . "kn<\n>";
    }
    if (empty($salary40)) {
        echo "nema osoba izmedu 30 i 40 godina<\n> ";
    } else {
        echo "Ukupna primanja svih osoba između 30 i 40 godina: " . array_sum($salary40) . "kn<\n>";
    }
    if (empty($salaryOlder)) {
        echo "nema osoba stajihij od 40 godina<\n> ";
    } else {
        echo "Ukupna primanja svih osoba starijih od 40 godina: " . array_sum($salaryOlder) . "kn<\n>";
    }
    if (empty($maleSalary)) {
        echo "nema muskaraca!<\n> ";
    } else {
        echo "ukupna primanja muskaraca: " . array_sum($maleSalary) . "kn<\n>";
    }
    if (empty($femaleSalary)) {
        echo "nema zena!<\n> ";
    } else {
        echo "ukupna primanja zena:" . array_sum($femaleSalary) . "kn<\n>";
    }
    if(!$femaleSalary) {
        echo "prazan je";
    }


    $j = array_sum($femaleSalary);
    $i = array_sum($maleSalary);
    $sumMale = $i - $j ;
    $sumFemale = $j - $i;


    if(array_sum($maleSalary) >  array_sum($femaleSalary)){
        echo "muskarci imaju veca primanja za" . $sumMale . "kn<\n>";
    }
    else{
        echo "zene imaju veca primanja za" . $sumFemale . "kn<\n>";
    }

}











