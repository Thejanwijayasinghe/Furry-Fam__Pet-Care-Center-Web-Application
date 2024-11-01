<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>About Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="images/foot.png">

        <link rel="stylesheet" href="css/aboutus.css">
        
        <style>
            .header-back .navbar-light .navbar-nav .active{
                color: #5f5f5f !important;
            }
        </style>

    </head>
    <body>

        <?php include 'firstHeader.php' ?>
        <!--main-->
        <section class="about-section">
            <div class="image-container">
                <img src="images/about as pic.jpg " alt="About Us Image">
            </div>
            <div class="content">
                <h2>Welcome To<span> Furry Fam!</span></h2>
                <p>
                    Welcome to our premier pet care service! We are dedicated to providing exceptional care and 
                    attention to your beloved furry friends. With our team of experienced professionals, we 
                    offer a wide range of services including grooming, boarding, and daycare. Whether it's a 
                    pampering session or a safe haven while you're away, trust us to treat your pets like family.
                    Discover the perfect blend of love, care, and expertise for your pets at our pet care service.
                </p> 
                <form action="readmore.php"><button class="read-more-btn">Read More...</button></form>

            </div>
        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
