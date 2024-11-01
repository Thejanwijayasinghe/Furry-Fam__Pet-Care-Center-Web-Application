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

    $question_id = $conn->real_escape_string($_POST["question_id"]);
    $answer = $conn->real_escape_string($_POST["answer"]);

    $sql = "UPDATE faqs SET answer = '$answer' WHERE id = '$question_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Answer added successfully!";
        header("Location: vetDashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the admin page if the form is not submitted
    header("Location: vetDashboard.php");
    exit();
}
?>
