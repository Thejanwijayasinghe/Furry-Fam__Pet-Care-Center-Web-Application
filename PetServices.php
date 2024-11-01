<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pet Services</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link href="css/dashstyles.css" rel="stylesheet" type="text/css"/>
        <link href="css/psstyle.css" rel="stylesheet" type="text/css"/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php include 'Header.php' ?>

        <section class="ps">
        <div class="container">
            <div class="heading">OUR <span>SERVICES</span></div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 1.jpg" alt="">

                </div>

                <div class="blog-post_info">

                    <p class="blog-post_title">Meet Best Veterinary</p>
                    <p class="blog-post_para">Click here to easily access vital information about veterinarians and conveniently book appointments through our web application.</p>
                    <a href="veterinarians.php" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 2.jpg" alt="">
                </div>

                <div class="blog-post_info">

                    <h1 class="blog-post_title">Health Information</h1>
                    <h3 class="blog-post_para">By clicking here, you can conveniently access articles, videos and vital  information about pets' health through our web application.</h3>
                    <a href="PetHealthInfo.php" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 3.jpg" alt="">
                </div>

                <div class="blog-post_info">

                    <h1 class="blog-post_title">Pet Profile</h1>
                    <h3 class="blog-post_para">This enables pet owners to upload pictures, communicate information, and keep records of their pets' and appointments.</h3>
                    <a href="petProfile.php" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 4.jpg" alt="">
                </div>

                <div class="blog-post_info">

                    <h1 class="blog-post_title">Pet Shop</h1>
                    <h3 class="blog-post_para">Clicking this allows you to conveniently purchase pet accessories for your beloved  furry friends.</h3>
                    <a href="PetShop.php" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 5.jpg" alt="">
                </div>

                <div class="blog-post_info">

                    <h1 class="blog-post_title">Pet Training Resources</h1>
                    <h3 class="blog-post_para">By clicking this, you can explore a wealth of articles, videos and lessons covering topics such as such as obedience training, socializing, and addressing common behavioral issues.</h3>
                    <a href="p" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

            <div class="blog-post">
                <div class="blog-post_img">
                    <img src="images/our service 6.jpg" alt="">
                </div>

                <div class="blog-post_info">

                    <h1 class="blog-post_title">Lost Pet Finder </h1>
                    <h3 class="blog-post_para">This facilitates, pet owners to report lost pets and provide detailed information about their missing pets including details, pictures and contact details.  Provides a platform to reunite lost pets with their owners and post and search for lost pets.</h3>
                    <a href="PetFinder.php" class="blog-post_cta" onclick="Go()">GO</a>
                </div>

            </div>

        </div>
        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
