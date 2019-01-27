<?php
require 'Person.php';

while( true ) {


    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if($choice == 6) {

        break;
    }

    // Act based on user choice
    switch($choice) {

        case 1:
            {

                break;
            }
        case 2:
            {
                insertMenu();

                echo "Name: ";
                $nameInput = fopen ("php://stdin","r");
                $name = fgets($nameInput);
                $lastNameInput = fopen ("php://stdin","r");
                echo "Lastname: ";
                $lastName = fgets($lastNameInput);
                createPerson($name, $lastName);
                break;
            }
        case 3:
            {
                break;
            }
        case 4:
            {
                break;
            }
        case 5:
            {
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
    echo "5 - Statistika\n";
    echo "6 - Izlaz\n";
    echo "************ InchooPHPAcademy ******************\n";
}

function insertMenu(){
    echo "************ Unesi novog zaposlenika ******************\n";


}

?>