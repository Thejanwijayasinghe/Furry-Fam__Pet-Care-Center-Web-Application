<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace classes;

use PDOException;
use PDO;

class User {

    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $role;

    public function __construct($firstName, $lastName, $username, $password, $role) {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getRole() {
        return $this->role;
    }

    public function getId() {
        return $this->id;
    }

    public function register($con) {
        try {
            $query = "INSERT INTO user(firstName, lastName, username, password, role) VALUES(?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->first_name);
            $pstmt->bindValue(2, $this->last_name);
            $pstmt->bindValue(3, $this->username);
            $pstmt->bindValue(4, $this->password);
            $pstmt->bindValue(5, $this->role);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in User class's register function: " . $exc->getMessage());
        }
    }

    public function authenticate($con) {
        try {
            $query = "SELECT * FROM user WHERE username = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->username);
            $pstmt->execute();
            $rs = $pstmt->fetch(PDO::FETCH_OBJ);
            if (!empty($rs)) {
                $db_password = $rs->password;
                if(password_verify($this->password, $db_password)){
                    $this->id = $rs->id;
                    $this->first_name = $rs->firstName;
                    $this->last_name = $rs->lastName;
                    $this->role = $rs->role;
                    $this->password = null;
                    return true;
                }   
                else{
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            die("Error in User class's authenticate fcuntion: " . $exc->getMessage());
        }
    }
    public function update($con){
        
    }

}
