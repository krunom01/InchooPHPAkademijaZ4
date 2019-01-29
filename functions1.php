<?php
// kontrola unosa stringova
function stringControl($string)
{
    if (!empty($string) and !preg_match('/[^a-z ćčžđš A-Z]+/',$string)) //ako je sve u redu, vrati string
    {
        return $string;
    }
    else
    {
        echo "pokusaj ponovo";
        return stringControl(readline()); //vrati liniju upisa
    }
}



//kontrola upila place, te stavljanje broja na dva decimalna broja
function salaryControl($number)
{
    if(!is_numeric($number) or !preg_match('/[^a-z ćčžđš A-Z]+/',$number) or $number <= 0)
    {
        echo "pogresno upisan broj";
        return salaryControl(readline());
    }
    else {
        return number_format($number, 2, '.', '');
    }

}

//kontrola datuma rođenja, te stavljanje u tablicu pod određenim uvjetima

function bithdateControl($date)
{
    $d = DateTime::createFromFormat('d.m.Y', $date);


    if ($d && $d->format('d.m.Y') == $date) {

        return date_format($d, 'd.m.Y');
    } else {
        echo "greska pi datuma (pravilno: 12.12.1900),pokusaj ponovo";
        return bithdateControl(readline());
    }
}


//kontrola upisa spola

function genderControl($gender){
    if ($gender === "F" || $gender === "M" )
    {
        return $gender;
    }
    else
    {
        echo "pogresno, upisi F ili M";
        return genderControl(readline());
    }
}
// funkcija za edit zaposlenika putem ID-a
function editEmployee($id, $firstname, $lastname, $birthdate, $gender, $salary)
{
    global $c;
    $a = $c->getItem($id);
    $a->setFirstName($firstname);
    $a->setLastName($lastname);
    $a->setBirthDate($birthdate);
    $a->setGender($gender);
    $a->setSalary($salary);
}


// funkcija za brisanje zaposlenika putem ID-a
function deleteEmployee($id)
{
    global $c;
    $c->deleteItem($id);
}

// funkcija za pronalazak zaposlenika putem ID-a
function searchEmployee($id)
{
    global $c;
    echo $c->getItem($id);
}

//funkcija za dobivanje svih zaposlenika i njihovih vrijednosti
function getAllEmployees()
{
    global $c;
    foreach ($c as $key => $val) {
        foreach ($val as $subkey => $subval) {

            echo "ID: " . $subval->getId() . " | FirstName: " . $subval->getFirstName() . " | LastName: " .
                $subval->getLastName() . " | BirthDate: " . $subval->getBirthDate() . " | Gender: " . $subval->getGender()
                . " | Salary: " . $subval->getSalary() . "\n";


        }
    }
}

//funkcija za unos novog zaposlenika
function setPerson($name, $lastName, $birthDate, $gender, $salary)
{
    global $c;
    $c->addItem(new Person($name, $lastName, $birthDate, $gender, $salary));
}


