<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './classes/User.php';
require_once './classes/DbConnector.php';

use classes\User;
use classes\DbConnector;

if (isset($_POST["firstname"], $_POST["lastname"], $_POST["username"], $_POST["password"], $_POST["cpassword"])) {
    if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["cpassword"])) {
        $location = "sign_up.php?status=1";
    } elseif ($_POST["password"] !== $_POST["cpassword"]) {
        $location = "sign_up.php?status=4";
    } else {
        $firstName = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $role = "petowner";
        $user = new User($firstName, $lastName, $username, $password, $role);
        if($user->register(DbConnector::getConnection())){
            $location = "sign_up.php?status=2";
        }
        else{
            $location = "sign_up.php?status=3";
        }
    }
} else {
    $location = "sign_up.php?status=0";
}

header("Location:" . $location);
?>