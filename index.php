<?php
require 'Person.php';

while( true ) {

    // Print the menu on console
    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if( $choice == 5 ) {

        break;
    }

    // Act based on user choice
    switch( $choice ) {

        case 1:
            {
                $name = trim( fgets(STDIN) );
                $lastName = trim( fgets(STDIN) );
                createPerson($name, $lastName);

                break;
            }
        case 2:
            {
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
        default:
            {
                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
            }
    }
}

function printMenu() {

    echo "************ Reservation System ******************\n";
    echo "1 - Insert new employee\n";
    echo "2 - Choose Destination\n";
    echo "3 - Personal Details\n";
    echo "4 - Make Reservation\n";
    echo "5 - Quit\n";
    echo "************ Reservation System ******************\n";
    echo "Enter your choice from 1 to 5 ::";
}

?>