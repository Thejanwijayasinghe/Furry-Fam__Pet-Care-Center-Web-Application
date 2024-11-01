<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question"])) {
    $question = $_POST["question"];

    $mysqli = new mysqli("localhost", "root", "", "faq_db");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO questions (question, answer) VALUES ('$question', '')";
    
    if ($mysqli->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
