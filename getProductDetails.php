<?php
// getProductDetails.php

// Start or resume the session
session_start();

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Connect to your database using prepared statements
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "furryfam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        ?>
        <h2>Added Product Details</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
        </table>
        <?php
    } else {
        echo "Product not found.";
        // Close the database connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid product details.";
}
?>
