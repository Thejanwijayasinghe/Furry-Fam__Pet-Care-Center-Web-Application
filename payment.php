<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/payment.css">
    <title>Payment Gateway</title>
    <link rel="icon" type="image/x-icon" href="images/foot.png">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <?php include 'Header.php' ?>

    <style>
        body {
            margin: 0;
            padding: 0;
            align-items: center;
            min-height: 100vh;
            justify-content: center;
        }

        .container {
            position: relative;
            max-width: 800px;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .inputBox {
            margin-bottom: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
        }

        .inputBox span {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input,
        select {
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }

        #card-number,
        #card-expiry,
        #card-cvc {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        #success-message {
            display: none;
            text-align: center;
            color: green;
            font-size: 18px;
            background-color: #8FED8F; /* Green background color */
            padding: 10px;
            border-radius: 5px;
        }

        #success-message::before {
            content: "\2713";
            font-size: 24px;
            margin-right: 5px;
            color: white; /* White color for checkmark */
        }
    </style>

    <div class="container">
        <form action="charge.php" method="post" id="payment-form">
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>

                    <div class="inputBox">
                        <span>Full name :</span>
                        <input type="text" name="customerName" id="full-name-input">
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email">
                    </div>
                    <div class="inputBox">
                        <span>Address :</span>
                        <input type="text">
                    </div>
                    <div class="inputBox">
                        <span>Amount :</span>
                        <input type="text" name="amount" id="amount-input">
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <span>Accepted Cards:</span>
                        <img src="images/logo-1.png" alt="">
                    </div>

                    <div class="inputBox">
                        <select id="cardholder-name" required>
                            <option value="" disabled selected>Select Your Card Name</option>
                            <option value="John Doe">visa</option>
                            <option value="Jane Doe">master</option>
                            <option value="Jane Doe">paypal</option>
                            <option value="Jane Doe">american</option>
                        </select>
                    </div>

                    <div class="inputBox">
                        <label for="card-number">Card Number:</label>
                        <div id="card-number"></div>
                    </div>
                    <div class="inputBox">
                        <label for="card-expiry">Expiration Date:</label>
                        <div id="card-expiry"></div>
                    </div>
                    <div class="inputBox">
                        <label for="card-cvc">CVC:</label>
                        <div id="card-cvc"></div>
                    </div>
                    <div id="success-message">
                        Payment successful! &#10004;
                    </div>
                </div>
            </div>
            <button type="submit" class="submit-btn" id="pay-now-btn">Pay Now</button>

        </form>
    </div>

    <?php include 'Footer.php' ?>

    <script>
        window.addEventListener('load', function () {
            var stripe = Stripe('pk_test_51OFgwbFuFv0TUd3ar1iGzoNv1IbkerBBNpZF1cpw1xsJfVdMl94eyceLY6ZuZIlrVn6ec6yZcj1XkKliHYlvzlNF00D7gRCe6R');
            var elements = stripe.elements();

            var card = elements.create('cardNumber');
            card.mount('#card-number');

            var cardExpiry = elements.create('cardExpiry');
            cardExpiry.mount('#card-expiry');

            var cardCvc = elements.create('cardCvc');
            cardCvc.mount('#card-cvc');

            var cardholderName = document.getElementById('cardholder-name');
            var form = document.getElementById('payment-form');
            var successMessage = document.getElementById('success-message');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                var amount = document.getElementById('amount-input').value;
                var customerName = document.getElementById('full-name-input').value;

                if (!amount || !customerName) {
                    alert('Please enter both Full Name and Amount.');
                    return;
                }

                stripe.createToken(card, {
                    name: customerName,
                    address_line1: '123 Street',
                    address_city: 'City',
                    address_state: 'State',
                    address_zip: '12345',
                }).then(function (result) {
                    if (result.error) {
                        alert(result.error.message);
                    } else {
                        sendTokenToServer(result.token.id, amount, customerName);
                    }
                });
            });

            function sendTokenToServer(token, amount, customerName) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'charge.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Hide the form
                            //form.style.display = 'none';

                            // Show the success message container
                            successMessage.style.display = 'block';
                        } else {
                            alert('Payment failed: ' + response.error);
                        }
                    }
                };
                xhr.send('token=' + token + '&amount=' + amount + '&customerName=' + customerName);
            }
        });
    </script>
</body>

</html>
