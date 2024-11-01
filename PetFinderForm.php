<?php
// Include your database connection code 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furryfam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'uploads' directory if it doesn't exist
$target_dir = "images/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle uploaded image
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image or a fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            // File is an image
            $uploadOk = 1;
        } else {
            // File is not an image
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can add more formats)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Retrieve other form data
    $petName = $_POST["petName"];
    $breed = $_POST["breed"];
    $type = $_POST["type"];
    $lostDate = $_POST["lostDate"];
    $lostTime = $_POST["lostTime"];
    $city = $_POST["city"];
    $additionalInfo = $_POST["additionalInfo"];
    $color = $_POST["color"];
    $age = $_POST["age"];
    $size = $_POST["size"];
    $gender = $_POST["gender"];
    $ownerName = $_POST["ownerName"];
    $ownerTP = $_POST["ownerTP"];
    $email = $_POST["email"];

    // Define the SQL query to insert data into the database
    $sql = "INSERT INTO lost_pets (petName, breed, type, lostDate, lostTime, city, additionalInfo, color, age, size, gender, ownerName, ownerTP, email, image)
            VALUES ('$petName', '$breed', '$type', '$lostDate', '$lostTime', '$city', '$additionalInfo', '$color', '$age', '$size', '$gender', '$ownerName', '$ownerTP', '$email', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        // Start a session to store form values
        session_start();

        // Store the form values in session variables
        $_SESSION['petName'] = $petName;
        $_SESSION['breed'] = $breed;
        $_SESSION['type'] = $type;
        $_SESSION['lostDate'] = $lostDate;
        $_SESSION['lostTime'] = $lostTime;
        $_SESSION['city'] = $city;
        $_SESSION['additionalInfo'] = $additionalInfo;
        $_SESSION['color'] = $color;
        $_SESSION['age'] = $age;
        $_SESSION['size'] = $size;
        $_SESSION['gender'] = $gender;
        $_SESSION['ownerName'] = $ownerName;
        $_SESSION['ownerTP'] = $ownerTP;
        $_SESSION['email'] = $email;
        //   $_SESSION['image'] = $_FILES['image']['name'];

        $_SESSION['image'] = $target_file; // Store the complete path including 'uploads/'



        echo "Record added successfully.";
        header("Location: PetFinder.php"); // Redirect to the PetFinder.php page
        exit(); // Terminate script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Lost Notice</title>

        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link rel="stylesheet" type="text/css" media="all" href="css/pffStyles.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
        <!-- Add the following JavaScript code inside the <head> tag of your HTML document -->

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Set default date to today
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('lostDate').min = today; // Set min attribute to today

        // Set default time to now
        var now = new Date();
        var hh = String(now.getHours()).padStart(2, '0');
        var min = String(now.getMinutes()).padStart(2, '0');
        var timeNow = hh + ':' + min;
        document.getElementById('lostTime').value = timeNow;

        // Add event listeners for date and time changes
        document.getElementById('lostDate').addEventListener('input', validateDateTime);
        document.getElementById('lostTime').addEventListener('input', validateDateTime);
    });

    // Function to validate Lost Date and Lost Time
    function validateDateTime() {
        var lostDateInput = document.getElementById('lostDate');
        var lostTimeInput = document.getElementById('lostTime');
        var selectedDate = new Date(lostDateInput.value + 'T' + lostTimeInput.value);

        // Disable past dates and times
        var currentDateTime = new Date();
        lostDateInput.min = (currentDateTime.toISOString().split('T'))[0];
        if (selectedDate < currentDateTime) {
            lostDateInput.setCustomValidity('Lost Date and Time cannot be set to a past date and time.');
        } else {
            lostDateInput.setCustomValidity('');
        }

        // Disable future dates
        if (selectedDate > currentDateTime) {
            lostDateInput.setCustomValidity('Lost Date and Time cannot be set to a future date and time.');
        } else {
            lostDateInput.setCustomValidity('');
        }
    }

    // Function to be called on form submission for overall validation
    function validateForm() {
        validateDateTime();
        // Add other form validation logic here
    }
</script>



    </head>
    <body>
        <?php include 'Header.php' ?>

        <section>

            <div class="title">
                <h1 style="font-weight: 800;">Pet Finder Form</h1>
            </div>

            <div class="container-md py-4">

            <form class="row g-3" method="POST" action="petFinderForm.php" enctype="multipart/form-data" onsubmit="return validateForm()">

                    <div>
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                 alt="example placeholder" style="width: 300px;" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn btn-success btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Upload image</label>
                                <input type="file" class="form-control d-none" id="customFile1" name="file">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-6">
                        <label for="inputPetName" class="form-label">Pet Name</label>
                        <input type="text" class="form-control" id="petName" name="petName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputBreed" class="form-label">Breed of Pet</label>
                        <input type="text" class="form-control" id="breed" name="breed">
                    </div>

                    <div class="col-md-4">
                        <label for="inputType" class="form-label">Type of Pet</label>
                        <select id="inputType" class="form-select" name="type">
                            <option selected>Choose...</option>
                            <option>Dog</option>
                            <option>Cat</option>
                            <option>Rabbit</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="lostDate" class="form-label">Lost Date</label>
                        <input type="date" class="form-control" name="lostDate" id="lostDate" required>
                    </div>
                    <div class="col-md-4">
                        <label for="lostTime" class="form-label">Lost Time</label>
                        <input type="time" class="form-control" name="lostTime" id="lostTime" required>
                    </div>

                    <div class="col-4">
                        <label for="inputCity" class="form-label">City where pet was lost</label>
                        <input type="text" class="form-control" id="inputCity" name="city" placeholder="">
                    </div>

                    <div class="col-8">
                        <label for="inputAdditionalInfo" class="form-label">Any additional information you'd like to share.</label>
                        <input type="text" class="form-control" id="inputAdditionalInfo" name="additionalInfo" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputColor" class="form-label">Color/Markings</label>
                        <input type="text" class="form-control" id="inputColor" name="color">
                    </div>
                    <div class="col-md-3">
                        <label for="inputAge" class="form-label">Age of Pet</label>
                        <select id="inputAge" class="form-select" name="age">
                            <option selected>Choose...</option>
                            <option>Baby</option>
                            <option>Young Adult</option>
                            <option>Adult</option>
                            <option>Senior</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inputSize" class="form-label">Size of Pet</label>
                        <select id="inputSize" class="form-select" name="size">
                            <option selected>Choose...</option>
                            <option value="small">Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputGender" class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                            <label class="form-check-label" for="exampleRadios1">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                            <label class="form-check-label" for="exampleRadios2">Female</label>
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-4">
                        <label for="inputOwnerName" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="ownerName" name="ownerName">
                    </div>

                    <div class="col-md-4">
                        <label for="inputOwnerTP" class="form-label">Contact Phone</label>
                        <input type="text" class="form-control" id="ownerTP" name="ownerTP">
                    </div>

                    <div class="col-md-4">
                        <label for="inputEmail" class="form-label">Contact Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>

                </form>

            </div>

        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
