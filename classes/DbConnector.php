<?php

namespace classes;

use PDO;
use PDOException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnector
 *
 * @author Thamasha Devindi
 */
class DbConnector {

    private static $host = "localhost";
    private static $dbname = "furryFam";
    private static $dbuser = "root";
    private static $dbpw = "";

    public static function getConnection() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $con = new PDO($dsn, self::$dbuser, self::$dbpw);
            return $con;
        } catch (PDOException $exc) {
            die("Error in database connection: " . $exc->getMessage());
        }
    }

}
