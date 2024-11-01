<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/hf.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
        <script>
            function menuToggle() {
                document.getElementById('nav-menu').classList.toggle('show');
            }
        </script>

        <!--header-->
        <div class="header">
            <ul style="list-style-type: none;">
                <li>
                    <div class="search-container">
                        <input type="text" placeholder="Search...">
                        <form><button class="search-button">Search</button></form>

                        <div class="buttons-container">
                            <form action="sign_up.php"><button class="signup-button">Sign Up</button></form>
                            <form action="Logingpage.php"><button class="signup-button">Sign In</button></form>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

        <div class="header-back">
            <div class="nav-back">
                <div class="nav-wrap">
                    <div class="nav-logo">
                        <a href="Home.php">
                            <img src="images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu-icon-wrap">
                        <img src="images/menu.png" class="menu-icon" alt="menu img" onclick="menuToggle()">
                    </div>
                    <div class="nav-menu" id="nav-menu">
                        <ul class="nav-menu-item" id="nav-menu-item">
                            <li class="nav-list-item">
                                <a class="nav-list-link active" href="Home.php">Home</a>
                            </li>
                          
                            <li class="nav-list-item pr-0">
                                <a class="nav-list-link" href="AboutUs.php">About Us</a>
                            </li>
                            <li class="nav-list-item pr-0">
                                <a class="nav-list-link" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </body>
</html>