<?php
$message = null;
if (isset($_GET["status"])) {
    $status = $_GET["status"];
    if ($status == 0) {
        $message = "<h6 class='text-danger'>Required values were not submitted</h6>";
    } elseif ($status == 1) {
        $message = "<h6 class='text-danger'>You must fill all fields to register with Samadhi BookStore</h6>";
    } elseif ($status == 2) {
        $message = "<h6>You have successfully registered with FurryFam</h6>";
    } elseif ($status == 3) {
        $message = "<h6 class='text-danger'>Error occurred during the registration. Please try again</h6>";
    } elseif ($status == 4) {
        $message = "<h6 class='text-danger'>Passwords do not match. Please confirm your password again.</h6>";
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">

        <style>
            .bg{
                background-size: cover;
                min-height: 95vh;
                width: 100%;
                background-image : url('images/background.jpg');
            }
            
            .cascading-center {
                margin-center: 50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-center: 0;
                }
            }
        </style>

    </head>
    <body>
        <?php include 'firstHeader.php' ?>

        <section class="bg">
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div class="card cascading-center"
                             style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5">Sign Up</h2>
                                <?= $message ?>
                                <form action="registration.php" method="POST">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="firstnameInput" name="firstname" class="form-control" placeholder="First name" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="lastnameInput" name="lastname" class="form-control" placeholder="Last name" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="emailInput" name="username" class="form-control" placeholder="Email address" required/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="passwordInput" name="password" class="form-control" placeholder="Password" required/>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="passwordInput" name="cpassword" class="form-control" placeholder="Confirm Password" required/>
                                    </div>
                                   

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-success btn-block mb-4">
                                        Sign Up
                                    </button>

                                    <div class="text-center">
                                        <p>Already have an account? <a href="Logingpage.php">Sign in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'Footer.php' ?>
    </body>
</html>