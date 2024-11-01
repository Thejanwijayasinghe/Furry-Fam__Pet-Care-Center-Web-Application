<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "furryfam";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $question = $conn->real_escape_string($_POST["question"]);

    // Default answer for simplicity
    $answer = "This question does not have an answer yet.";

    $sql = "INSERT INTO faqs (question, answer) VALUES ('$question', '$answer')";

    if ($conn->query($sql) === TRUE) {
        echo "FAQ added successfully!";
        header("Location: faq.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the index page if the form is not submitted
    header("Location: faq.php");
    exit();
}
?>
