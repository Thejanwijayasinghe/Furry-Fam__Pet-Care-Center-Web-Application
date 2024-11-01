<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furryfam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pet Shop</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link rel="stylesheet" type="text/css" href="css/petshop.css">

        <style>

            .container .search
            {
                display: flex;
                padding: 20px 7px;
                justify-content: space-between;
                border-color: black;
             
            }
            .container .search h1
            {
                letter-spacing: 2px;
                display: inline-block;
                border-bottom: 2px solid green;
                padding-bottom: 10px;
            }
            .container .search input
            {
                width: 40%;
                padding: 5px 16px;
                background: transparent;
                border: 1px solid #000;
                font-size: 20px;
                text-transform: capitalize;
                letter-spacing: 3px;
                outline: none;
            }
            .container .search input::placeholder
            {
                color: green;
                font-weight: 500;
            }
        </style>
    </head>

    <body>
        <?php include 'Header.php' ?>

        <h1 style="color: #03750B; font-family: serif; font-weight: 800; margin-top: 15px;">Pet Shop</h1>

        <?php
        $categories = array(
            'Dog' => array('Supplement', 'Pet Food', 'Pet Supplies'),
            'Cat' => array('Supplement', 'Pet Food', 'Pet Supplies'),
            'Rabbit' => array('Supplement', 'Pet Food', 'Pet Supplies')
        );
        ?>



        <div class="categories">
            <?php
            foreach ($categories as $category => $subCategories) {
                echo '<div class="category">';
                echo "<h2>$category</h2>";
                echo '<ul class="sub-categories">';
                foreach ($subCategories as $subCategory) {
                    echo "<li>$subCategory</li>";
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="container">
            
            <div class="search">
                <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
            </div>

            <h2>Supplement</h2>
            <div class="category">
                <div class="products">

                    <div class="product">
                        <img src="images/PS_1.jpeg" alt="Supplement Product 1">
                        <h3>Trixie Lachsol Salmon</h3>
                        <p>Price: USD 4900</p>
                        <div class="options">

                        <form method="post" action="addtocart.php">
                            <input type="hidden" name="product_id" value="1">
                            <!-- Add more hidden fields for product details -->
                            <input type="hidden" name="product_name" value="Trixie Lachsol Salmon 500ml">
                            <input type="hidden" name="product_price" value="4900">
                            <!-- Other hidden fields as needed -->

                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="2">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/PS_2.jpeg" alt="Supplement Product 2">
                        <h3>Trixie Bone Mineral 800g</h3>
                        <p>Price: USD 3900</p>
                        <div class="options">
                           
                        <form method="post" action="addtocart.php">
                            <input type="hidden" name="product_id" value="2">
                            <!-- Add more hidden fields for product details -->
                            <input type="hidden" name="product_name" value="Trixie Bone Mineral 800g">
                            <input type="hidden" name="product_price" value="3900">
                            <!-- Other hidden fields as needed -->

                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/PS_3.jpeg" alt="Supplement Product 3">
                        <h3>Aminomax 200ml</h3>
                        <p>Price: USD 600 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>

                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PS_4.png" alt="Supplement Product 4">
                        <h3>Beaphar Top 10 Vit Tab</h3>
                        <p>Price: USD 9950 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PS_5.jpeg" alt="Supplement Product 5">
                        <h3>ARBCE Pet 200ml</h3>
                        <p>Price: USD 850 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PS_6.jpeg" alt="Supplement Product 6">
                        <h3>Viusid Pets 150ml</h3>
                        <p>Price: USD 3780 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PS_7.jpeg" alt="Supplement Product 7">
                        <h3>Calci Boost Syrup 200ml</h3>
                        <p>Price: USD 400 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PS_8.jpeg" alt="Supplement Product 8">
                        <h3>Lead coat 30gels</h3>
                        <p>Price: USD 930 </p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <h2>Pet Food</h2>
            <div class="category">
                <div class="products">

                    <div class="product">
                        <img src="images/PF_1.jpeg" alt="Food Product 1">
                        <h3>Morando Dog Adult</h3>
                        <p>Price: Rs.26500/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/PF_2.jpeg" alt="Food Product 2">
                        <h3>Morando Puppy</h3>
                        <p>Price: Rs.28750/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/PF_3.jpeg" alt="Food Product 3">
                        <h3>Miglior Cane Senior</h3>
                        <p>Price: Rs.7250/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PF_4.jpeg" alt="Food Product 4">
                        <h3>Trendline Adult Beef 1Kg</h3>
                        <p>Price: Rs.1750/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PF_5.jpeg" alt="Food Product 5">
                        <h3>Miglior Gatto Hairball</h3>
                        <p>Price: Rs.4950/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PF_6.jpeg" alt="Food Product 6">
                        <h3>Premium Cat Adult</h3>
                        <p>Price: Rs.5220/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PF_7.jpeg" alt="Food Product 7">
                        <h3>Royal canin Kitten 2Kg</h3>
                        <p>Price: Rs.10950/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/PF_8.jpeg" alt="Food Product 8">
                        <h3>Meat Up Real Chicken</h3>
                        <p>Price: Rs.280/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <h2>Pet Suppliers</h2>
            <div class="category">
                <div class="products">

                    <div class="product">
                        <img src="images/Ps_1.webp" alt="Supplier Product 1">
                        <h3>Cat and Dog Hair Remover</h3>
                        <p>Price: Rs.1350/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/PS_2.jpeg" alt="Supplier Product 2">
                        <h3>Dog Mats Bolster Mattress</h3>
                        <p>Price: Rs.16500/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>


                    <div class="product">
                        <img src="images/Ps_3.webp" alt="Supplier Product 3">
                        <h3>Solid Nylon Dog Collar</h3>
                        <p>Price: Rs.4200/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/Ps_4.webp" alt="Supplier Product 4">
                        <h3>Adjustable Soft Mesh</h3>
                        <p>Price: Rs.850/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/Ps_5.webp" alt="Supplier Product 5">
                        <h3> Climbing Scratcher Toy</h3>
                        <p>Price: Rs.4500/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/Ps_6.webp" alt="Supplier Product 6">
                        <h3>Braided Rope Dumbbell</h3>
                        <p>Price: Rs.1200/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/Ps_7.webp" alt="Supplier Product 7">
                        <h3>Dog Training Ball</h3>
                        <p>Price: Rs.900/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                    <div class="product">
                        <img src="images/Ps_8.webp" alt="Supplier Product 8">
                        <h3>Screaming Rubber Toy</h3>
                        <p>Price: Rs.1800/=</p>
                        <div class="options">
                            <form method="post" action="addtocart.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>

                            <form method="post" action="viewproduct.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="view-product">View Product</button>
                            </form>

                            <form method="post" action="payment.php">
                                <input type="hidden" name="product_id" value="3">
                                <button type="submit" class="buy-now">Buy Now</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>        
<script type="text/javascript">
            function search() {
                let filter = document.getElementById('find').value.toUpperCase();
                let item = document.querySelectorAll('.product');
                let l = document.getElementsByTagName('h3');
                for (var i = 0; i <= l.length; i++) {
                    let a = item[i].getElementsByTagName('h3')[0];
                    let value = a.innerHTML || a.innerText || a.textContent;
                    if (value.toUpperCase().indexOf(filter) > -1) {
                        item[i].style.display = "";
                    } else
                    {
                        item[i].style.display = "none";
                    }
                }
            }
        </script>
<?php include 'Footer.php' ?>
</body>
</html>