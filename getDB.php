<?php
/**
 * Created by PhpStorm.
 * User: kruno
 * Date: 25/01/19
 * Time: 1.33
 */

require 'DBdata.php';

class getDB
{
    public static function getDBvalues($parts){ //static funckija kako bi u PDO-u mogao prostupiti podacima

        return $GLOBALS['DBdata'][$parts];  // vraca podatke iz arraya; file DBdata.php
    }
}

