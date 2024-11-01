<?php
session_start();
require_once './classes/User.php';
require_once './classes/DbConnector.php';

use classes\User;
use classes\DbConnector;

$location = "Logingpage.php"; // Default redirect location

if (isset($_POST["username"], $_POST["password"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $location .= "?status=1"; // Missing username or password
    } else {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $user = new User(null, null, $username, $password, null);
        if ($user->authenticate(DbConnector::getConnection())) {
            $_SESSION["user_id"] = $user->getId();
            $_SESSION["user_firstname"] = $user->getFirstName();
            $_SESSION["user_lastname"] = $user->getLastName();
            
            if ($user->getRole() == "admin") {
                $location = "AdminDashboard.php"; // Redirect to admin page
            } elseif ($user->getRole() == "veterinarian") {
                $location = "VetDashboard.php"; // Redirect to veterinarian page
            } else {
                $location = "HomeU.php"; // Redirect to user home page
            }
        } else {
            $location .= "?status=2"; // Incorrect username or password
        }
    }
} else {
    $location .= "?status=0"; // Values not submitted
}

header("Location: " . $location);
exit();
?>
