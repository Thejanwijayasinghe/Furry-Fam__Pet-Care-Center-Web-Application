<?php
// addtocart.php

// Start or resume the session
session_start();

// Check if product_id is set and not empty
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

        // Add the product details to the shopping cart (you can use sessions, a database, or other storage)
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][] = array(
            'product_id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            // Add other product details as needed
        );
    } else {
        echo "Product not found.";
    }

    $stmt->close();
    $conn->close();
}

// Handle deletion if the delete form is submitted
if (isset($_POST['delete_product_id']) && !empty($_POST['delete_product_id'])) {
    $delete_product_id = $_POST['delete_product_id'];

    // Find the index of the item in the cart based on product_id
    $index = array_search($delete_product_id, array_column($_SESSION['cart'], 'product_id'));

    // Remove the item from the cart if it exists
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
        echo "Item removed from the cart.";
    } else {
        echo "Item not found in the cart.";
    }
}

// Display the updated product details table
echo "<html>
        <head>
            <title>Cart Details</title>
            
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                }
                .cart-details {
                    margin: 20px;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 10px;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }
                th {
                    background-color: #f2f2f2;
                }
                .action-buttons {
                    display: flex;
                    justify-content: space-between;
                    align-items: center; 
                }
                .delete-button, .pay-button, .back-button {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 5px 8px; /* Adjust button size */
                    cursor: pointer;
                    margin-right: 2px;
                }
                .delete-button {
                    background-color: #ff4d4d; 
                }
                .pay-button {
                    background-color: #4CAF50; 
                }
                .back-button {
                    background-color: #007BFF; 
                    float: right;
                    margin-top: 30px; /* Adjust the margin to your preference */
                }
                .total-price {
                    margin-top: 10px;
                    font-weight: bold;
                }
            </style>

        </head>
        <body>
            <div class='cart-details'>
                <h2>Cart Details</h2>
                <table>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>";

$totalPrice = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        if (is_array($item) && isset($item['product_id']) && isset($item['name']) && isset($item['price'])) {
            echo "<tr>
                    <td>{$item['product_id']}</td>
                    <td>{$item['name']}</td>
                    <td>{$item['price']}</td>
                    <td class='action-buttons'>
                        <form method='post' action=''>
                            <input type='hidden' name='delete_product_id' value='{$item['product_id']}'>
                            <button type='submit' class='delete-button'>Delete</button>
                        </form>
                        <a href='payment.php' class='pay-button'>Pay</a>
                    </td>
                  </tr>";
            $totalPrice += $item['price']; // Update total price
        }
    }
} else {
    echo "<tr><td colspan='4'>Your cart is empty</td></tr>";
}

echo "</table>
      <div class='total-price'>Total Price: $totalPrice</div>
      <button class='back-button' onclick='goBack()'>Back</button>
    </div>
  </body>
  <script>
    function goBack() {
        window.location.href = 'PetShop.php'; // Replace 'PetShop.php' with the actual page you want to go back to
    }
  </script>
</html>";
?>
