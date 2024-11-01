<?php
session_start();

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Find the index of the item in the cart based on product_id
    $index = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));

    // Remove the item from the cart if it exists
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
        echo "Item removed from the cart.";
    } else {
        echo "Item not found in the cart.";
    }
} else {
    echo "Invalid product details.";
}
?>
