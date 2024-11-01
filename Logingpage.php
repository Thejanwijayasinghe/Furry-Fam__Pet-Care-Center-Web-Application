<?php
$message = null;
if (isset($_GET["status"])) {
    $status = $_GET["status"];
    if ($status == 0) {
        $message = "<h6 class='text-danger'>Required values were not submitted</h6>";
    } elseif ($status == 1) {
        $message = "<h6 class='text-danger'>Username and password are required to enter</h6>";
    } else {
        $message = "<h6 class='text-danger'>Username and password is incorrect. Please try again</h6>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">

        <style>
            .bg{
                background-size: cover;
                min-height: 95vh;
                width: 100%;
                background-image : url('images/background.jpg');
            }

            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
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
                        <div class="card cascading-right"
                             style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5">Sign In</h2>
                                <?= $message ?>
                                <form action="login.php" method="POST">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="emailInput" name="username" class="form-control" placeholder="Email address" required/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="passwordInput" name="password" class="form-control" placeholder="Password" required/>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-success btn-block mb-4">
                                        Sign In
                                    </button>

                                    <div class="text-center">
                                        <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <?php include 'Footer.php' ?>
    </body>
</html>
