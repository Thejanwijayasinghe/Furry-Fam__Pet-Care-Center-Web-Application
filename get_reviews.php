
<?php
// Replace these variables with your actual database credentials
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

// Function to get reviews from the database
function getReviews($conn)
{
    $sql = "SELECT * FROM reviews ORDER BY date DESC";
    $result = $conn->query($sql);

    $reviews = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    foreach ($reviews as $row) {
        echo '<div class="review">';
        echo '<p class="author">' . $row["author"] . '</p>';
        echo '<p class="date">' . $row["date"] . '</p>';
        echo '<p>' . $row["review"] . '</p>';
        echo '</div>';
    }
}

// Get reviews from the database
getReviews($conn);

// Close the database connection
$conn->close();
?>
