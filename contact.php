<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <title>Contact Us</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


        <style>
            *{

                padding: 0;
                margin: 0;
                color: #fff;

                font-family: 'Poppins', sans-serif;
                border: none;
            }
            body{

                background-image: url('images/contact.jpeg');
                width: 110%;
                height: 150vh;
                background-size: 110% 130vh;
                position: relative;
                background-repeat: no-repeat;
                font-family: Arial, sans-serif;
                color: #000000;

                margin-bottom: -250px;
            }



            header{
                position: absolute;
                text-align: center;
                width: 75%;
                left: 12%;
                top: 2rem;
            }
            header h1{
                font-size: 30px;
            }
           .container {
        margin-top: 100px; /* Adjust as needed */
        padding: 20px;
        background-color: transparent;
        border-radius: 10px;
    }

    .content {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .content section {
        text-align: center;
    }

    .media {
        position: absolute;
        top: 85vh;
        right: 20vh;
        display: flex;
        list-style: none;
    }

    .media li {
        margin: 20px 30px;
    }

    /* Add some padding and margin to social media icons for spacing */
    .media i {
        padding: 10px;
        margin: 0 5px;
        background-color: #fff; /* Add a background color to social media icons */
        border-radius: 50%; /* Make them circular */
        cursor: pointer;
    }

    @media screen and (max-width: 900px) {
        body {
            background-repeat: repeat-y;
            overflow: auto;
        }

        header {
            position: absolute;
            left: 0;
            top: 20%;
            width: 100%;
        }

        .empty {
            height: 210vh;
        }
    }


        </style>

        <script>
            function menuToggle() {
            document.getElementById('nav-menu').classList.toggle('show');
            }
        </script>




    </head>

    <body>
        <?php include './firstHeader.php' ?>



        <div class="container">

            <br><br><h1 align="center">Welcome To Petcare Center</h1>
            <br><p align="center">Welcome to our PetCare Contact Us page! 
                At PetPals, we're passionate about your furry friends. Reach out to our pet-loving experts for personalized assistance and top-notch support. Join the PetPals community and let's make tails wag and hearts purr together! Contact us now!.</p>


            <div class="content">
                <div class="content-form">
                    <section>

                        <h2>Address</h2>
                        <p>
                            10th Floor,<br>
                            Furry Fam Pet Care Center,<br>
                            Colombo 02,<br>
                            Sri Lanka<br>

                        </p>
                    </section>

                    <section>

                        <h2>Phone</h2>
                        <p> (+94) 11 2356798</p>
                    </section>

                    <section>

                        <h2>E-mail Address</h2>
                        <p>petcare.ei@gmail.com</p>
                    </section>
                </div>
            </div>

            
        </div>


        <div class="empty">

        </div>



        <script src="https://smtpjs.com/v3/smtp.js"></script> 
        <script>
                                function send email() {
                                Email.send({
                                SecureToken: "276166d7-d5ea-4620-b6d3-7d5c0dc87882",
                                        To: 'tjmalisha@gmail.com',
                                        From: document.getElementById("email").value,
                                        Subject: "New Contact From Enquiry",
                                        Body: "And this is the body"
                                }).then(
                                        message => alert(message)
                                        );
                                }</script>
        <?php include 'Footer.php' ?>
    </body>
</html>
