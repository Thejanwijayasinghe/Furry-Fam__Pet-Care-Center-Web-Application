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

    $review_id = $conn->real_escape_string($_POST["review_id"]);

    $sql = "DELETE FROM reviews WHERE id = '$review_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Review deleted successfully!";
        header("Location: AdminDashboard.php");
    } else {
        echo "Error deleting review: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the admin page if the form is not submitted
    header("Location: AdminDashboard.php");
    exit();
}
?>
