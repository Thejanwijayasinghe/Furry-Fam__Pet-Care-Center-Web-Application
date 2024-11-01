<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Reveiws</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link href="css/reveiw.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include 'Header.php' ?>

        <section class="bd">
            <header>
                <h1>Customer Reviews</h1>
            </header>

            <section class="sec">
                <?php include 'get_reviews.php'; ?>
            </section>

            <section class="sec add-review-form">
                <h2>Add Your Review</h2>
                <form action="add_review.php" method="post">
                    <label for="author">Your Name:</label>
                    <input type="text" id="author" name="author" required>

                    <label for="review">Your Review:</label>
                    <textarea id="review" name="review" rows="4" required></textarea>

                    <input type="submit" value="Submit Review">
                </form>
            </section>
        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
