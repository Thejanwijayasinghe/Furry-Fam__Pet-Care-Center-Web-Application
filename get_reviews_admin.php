
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

// Function to get reviews from the database for admin
function getReviewsAdmin($conn)
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
        echo '<form action="delete_review.php" method="post" class="delete-form">';
        echo '<input type="hidden" name="review_id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="delete-button">Delete Review</button>';
        echo '</form>';
        echo '</div>';
    }
}

// Get reviews from the database for admin
getReviewsAdmin($conn);

// Close the database connection
$conn->close();
?>
