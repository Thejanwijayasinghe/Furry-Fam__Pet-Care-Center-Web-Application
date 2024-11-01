<?php

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

// Function to get FAQs from the database for admin
function getFAQsAdmin($conn) {
    $sql = "SELECT * FROM faqs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="faq">';
            echo '<h4>ID: ' . $row["id"] . '</h4>';
            echo '<h5>Q: ' . $row["question"] . '</h5>';
            echo '<p>A: ' . $row["answer"] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No FAQs available.</p>';
    }
}

// Get FAQs from the database for admin
getFAQsAdmin($conn);

// Close the database connection
$conn->close();
?>

