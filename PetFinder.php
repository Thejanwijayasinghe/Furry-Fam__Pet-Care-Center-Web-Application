<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furryfam";

// Create a database connection
$dbConnection = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$query = "SELECT * FROM lost_pets";
$result = mysqli_query($dbConnection, $query);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pet Finder</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">

    </head>
    <body>
        <?php include 'Header.php' ?>

        <section>
            <h1 style="color: #03750B; font-family: serif; font-weight: 800; margin-top: 15px;">Pet Finder</h1>

            <nav class="navbar navbar-expand-">
                <div class="container-fluid justify-content-center">
                    <form class="d-flex">
                        <a href="petFinderForm.php">
                            <button class="btn btn-success me-2" type="button">Add Lost Notice</button>
                        </a>
                    </form>
                </div>
            </nav>

            <div class="py-2">
                <?php
                // Loop through the database results and display them
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<div class="card mb-3" style="margin-left: 5em; margin-right: 5em; background-color: #bfffcc; border-radius: 0; border-style: none;">';

                    echo '<div class="card" style="margin-left: 5em; margin-right: 5em; background-color: #bfffcc; border-radius: 0; border-style: none;">';
                    echo '<div class="row">';
                    echo '<div class="col-md-3 align-self-center">';
                    echo '<img src="' . $row['image'] . '" class="img-fluid" alt="' . $row['petName'] . '">';
                    echo '</div>';
                    echo '<div class="col-md-9 py-1">';
                    echo '<h5 class="card-title" style="font-family: serif; font-weight: 800; font-size: 30px;">' . htmlspecialchars($row["petName"]) . '</h5>';
                    echo '<div class="row text-center">';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Breed: </strong>' . htmlspecialchars($row["breed"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Type: </strong>' . htmlspecialchars($row["type"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Lost on: </strong>' . htmlspecialchars($row["lostDate"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Lost at: </strong>' . htmlspecialchars($row["lostTime"]) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row text-center">';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Color/Markings: </strong>' . htmlspecialchars($row["color"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Age: </strong>' . htmlspecialchars($row["age"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                    echo '<p class="card-text"><strong>Size: </strong>' . htmlspecialchars($row["size"]) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr>';
                    echo '<div class="col-md-12 text-center">';
                    echo '<p class="card-text"><strong>Special Notice:</strong>' . htmlspecialchars($row["additionalInfo"]) . '</p>';
                    echo '</div>';
                    echo '<hr>';
                    echo '<div class="row text-center">';
                    echo '<div class="col-md-4">';
                    echo '<p class="card-text"><strong>Contact:</strong>' . htmlspecialchars($row["ownerName"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '<p class="card-text"><strong>TelePhone: </strong>' . htmlspecialchars($row["ownerTP"]) . '</p>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '<p class="card-text"><strong>Email: </strong>' . htmlspecialchars($row["email"]) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    echo '</div>';
                }
                ?>
            </div>
        </section>
        <?php include 'Footer.php' ?>
    </body>
</html>
