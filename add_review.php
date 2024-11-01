
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $author = $conn->real_escape_string($_POST["author"]);
    $review = $conn->real_escape_string($_POST["review"]);

    $sql = "INSERT INTO reviews (author, review, date) VALUES ('$author', '$review', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Review added successfully!";
        header ("Location: review.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the index page if the form is not submitted
    header("Location: index.html");
    exit();
}
?>
