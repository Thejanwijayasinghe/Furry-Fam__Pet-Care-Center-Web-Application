<?php
// shoppingcart.php

// Start or resume the session
session_start();

function calculateTotal() {
    $total = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'];
        }
    }

    return $total;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="icon" type="image/x-icon" href="images/foot.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        .cart-items {
            list-style: none;
            padding: 0;
        }

        .cart-items li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            background-color: #f5f5f5;
            padding: 10px;
            color: #000;
            border-radius: 5px;
        }

        .total {
            font-weight: bold;
            margin-top: 20px;
        }

        .buy {
            margin-right: 10px;
        }

        .remove {
            margin-left: 10px;
        }

        @media (max-width: 576px) {
            .container {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <?php include 'Header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shopping Cart</h1>

                <ul class="cart-items">
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            echo '<li>';
                            echo '<span>' . $item['name'] . '</span>';
                            echo '<span>$' . number_format($item['price'], 2) . '</span>';
                            echo '<form method="post" action="removefromcart.php">';
                            echo '<input type="hidden" name="product_id" value="' . $item['product_id'] . '">';
                            echo '<button type="submit" class="remove btn btn-danger">Remove</button>';
                            echo '</form>';
                            echo '</li>';
                        }
                        echo '<li class="total">Total: $' . number_format(calculateTotal(), 2) . '</li>';
                    } else {
                        echo '<li>No items in the cart</li>';
                    }
                    ?>
                </ul>

                <a href="checkout.php" class="buy btn btn-primary">Proceed to Checkout</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <?php include 'Footer.php' ?>
</body>

</html>
