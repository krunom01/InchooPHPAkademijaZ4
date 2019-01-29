<?php

require 'Person.php';
require 'functions.php';

while( true ) {


    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if($choice == 7) {

        break;
    }

    // Act based on user choice
    switch($choice) {

        case 1:
            {
                getAllEmployees();
                break;
            }
        case 2:
            {
                insertMenu();
                //kontrola upisa
                echo "firstName: ";
                $ime = stringControl(readline());

                echo "lastName: ";
                $prezime = stringControl(readline());

                echo "birthdate: ";
                $birthDate = bithdateControl(readline());

                echo "gender: ";
                $gender = genderControl(readline());

                echo "Salary: ";
                $salary = salaryControl(readline());

                setPerson($ime, $prezime, $birthDate, $gender, $salary);
                break;


            }
        case 3:
            {
                editMenu();
                echo "id: ";
                $search = trim(fgets(STDIN));
                searchEmployee($search);
                echo "\n";
                //kontrola upisa
                echo "firstName: ";
                $ime = stringControl(readline());

                echo "lastName: ";
                $prezime = stringControl(readline());

                echo "birthdate: ";
                $birthDate = bithdateControl(readline());

                echo "gender: ";
                $gender = genderControl(readline());

                echo "Salary: ";
                $salary = salaryControl(readline());
                editEmployee($search,$ime,$prezime,$birthDate,$gender,$salary);
                break;

            }
        case 4:
            {
                deleteMenu();

                echo "Enter employee ID: ";
                $inputName = trim(fgets(STDIN));
                echo "Are you sure you want to do this?  Type 'yes' to continue: ";
                $handle = fopen("php://stdin", "r");
                $line = fgets($handle);
                if (trim($line) != 'yes') {
                    echo "ABORTING!\n";
                    exit;
                } else {
                    deleteEmployee($inputName);
                }
                break;
            }
        case 5:
            {
                searchMenu();
                echo "id: ";
                $search = trim(fgets(STDIN));
                searchEmployee($search);
                break;

            }
        case 6:
            {
                statistic($days, $c);
                break;
            }
        default:
            {
                echo "\n\nUnesi broj!\n\n";
            }
    }
}

function printMenu() {

    echo "************ Welcome to console app ******************\n";
    echo "1 - Pregled Zaposlenika\n";
    echo "2 - Unos novog Zaposlenika\n";
    echo "3 - Promjena podataka postojećem zaposleniku\n";
    echo "4 - Brisanje Zaposlenika\n";
    echo "5 - Pretraga zaposlenika po IDu\n";
    echo "6 - Statistika\n";
    echo "7 - Izlaz\n";

    echo "************ InchooPHPAcademy ******************\n";
}

function insertMenu(){
    echo "************ Unesi novog zaposlenika ******************\n";

}
function deleteMenu(){
    echo "************ Obrisi zaposlenika tako da upisete njegov id! ******************\n";
}
function searchMenu(){
    echo "************ Opronađite zaposlenike tako da upisete njegov id! ******************\n";
}
function editMenu(){
    echo "************ pronadite zaposlenika kojeg zelite promjeniti putem njegovog id-a  ******************\n";
}

