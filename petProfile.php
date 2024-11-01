<?php
// Check if the form was submitted and the "submit" button was clicked
if (isset($_POST["submit"])) {
    // Check if a file is uploaded
    if ($_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
        $file_name = $_FILES["photo"]["name"];
        $file_tmp = $_FILES["photo"]["tmp_name"];

        // Define the directory where you want to store the images
        $upload_dir = "images/";
        $target_file = $upload_dir . basename($file_name);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Insert the image information into the database
            $conn = new mysqli("localhost", "root", "", "furryfam");

            // Check the database connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare the SQL statement
            $sql = "INSERT INTO pet_images (filename, uploaded_at) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);

            // Check if the statement was prepared successfully
            if ($stmt) {
                // Bind the file name as a parameter
                $stmt->bind_param("s", $file_name);

                // Execute the SQL statement
                if ($stmt->execute()) {
                    echo "Image uploaded and inserted into the database successfully.";
                } else {
                    echo "Error inserting data into the database: " . $stmt->error;
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error preparing the SQL statement: " . $conn->error;
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Sorry, there was an error moving the uploaded file.";
        }
    } else {
        echo "File upload error: " . $_FILES["photo"]["error"];
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pet Profile</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link rel="stylesheet" type="text/css" href="css/petprofile.css">

        <style>

            body {
                display:inline;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh; /* Use viewport height for full-page centering */
            }
            /* Define your CSS styles here */
            .image-grid {
                display: grid;
                grid-template-columns: repeat(6, 1fr); /* Default: 4 columns for large screens */
                gap: 5px;
            }

            @media screen and (max-width: 768px) {
                /* For medium screens, switch to 2 columns */
                .image-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media screen and (max-width: 480px) {
                /* For small screens, switch to 1 column */
                .image-grid {
                    grid-template-columns: 1fr;
                }
            }

            .grid-cell {
                text-align: center;
            }

            .grid-cell img {
                max-width: 100%;
                height: auto;
            }

            /* Style for the "Choose File" and "Upload" buttons */
            #fileInput {
                display: none; /* Hide the default file input */
            }

            .custom-upload-button {
                background-color: #03750B;
                color: #fff;
                padding: 10px 20px;
                align-items: center;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Style for the "Upload" button */
            #uploadButton {
                background-color: #03750B;
                color: #fff;
                padding: 10px 20px;
                align-items: center;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Style for the file name display */
            #fileNameDisplay {
                margin-top: 10px;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <?php include 'Header.php' ?>

        <section>
            <h1 style="color: #03750B; font-family: serif; font-weight: 800; margin-top: 15px;">Pet Profile</h1>
            <nav class="navbar navbar-expand-">
                <div class="container-fluid justify-content-center">
                    <div class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="custom-button" href="#gallery">Gallery</a>
                                </div>
                                <div class="col-md-4">
                                    <a class="custom-button" href="#vaccin">Vaccination</a>
                                </div>
                                <div class="col-md-4">
                                    <a class="custom-button" href="#appointment">Appointments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row no-gutters portfolio-topic">
                        <h1 class="profile-sub-topic" id="gallery">Pet Gallery</h1>
                    </div>
                    <form id="photo-upload-form" action="petProfile.php" method="POST" enctype="multipart/form-data">
                        <!-- Hidden file input -->
                        <input type="file" name="photo" id="fileInput" accept="image/*">
                        <!-- Custom "Choose File" button -->
                        <label for="fileInput" class="custom-upload-button">Choose File</label>
                        <!-- Display selected file name -->
                        <span id="fileNameDisplay"></span>
                        <!-- Custom "Upload" button -->
                        <input type="submit" name="submit" id="uploadButton" value="Upload">
                    </form>
                </div>


                <div class="uploaded-photos">
                    <!-- Create an image collage container -->
                    <div class="image-collage" id="imageCollage">
                        <!-- Images will be dynamically added here via JavaScript -->
                    </div>

            </nav>


            <script>


                // Function to fetch and display the latest images
                function fetchAndDisplayImages() {
                    fetch('petProfile.php') // Fetch image filenames from uploads.php
                            .then(response => response.json())
                            .then(data => {
                                displayImages(data);
                            })
                            .catch(error => {
                                console.error('Error fetching images:', error);
                            });
                }

                // Function to display images
                function displayImages(data) {
                    var imageCollage = document.getElementById('imageCollage');
                    imageCollage.innerHTML = ''; // Clear previous images
                    data.forEach(imageFilename => {
                        var imgDiv = document.createElement('div');
                        imgDiv.className = 'img';
                        var img = document.createElement('img');
                        img.src = 'images/' + imageFilename;
                        img.alt = 'Uploaded Photo';
                        imgDiv.appendChild(img);
                        imageCollage.appendChild(imgDiv);
                    });
                }

                // Fetch and display images initially
                fetchAndDisplayImages();

                // Set up an interval to periodically update images 
                setInterval(fetchAndDisplayImages, 10000); // Adjust the interval as needed
            </script>


            <div class="uploaded-photos">
                <!-- Create an image collage container -->
                <div class="image-grid">
                    <?php
                    // Create a database connection
                    $conn = new mysqli("localhost", "root", "", "furryfam");

                    // Check the database connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the pet_images table
                    $sql = "SELECT filename FROM pet_images";
                    $result = $conn->query($sql);

                    // Check if there are any rows returned
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $filename = $row["filename"];
                            $image_path = "images/" . $filename;

                            // Display each image in a grid cell
                            echo "<div class='grid-cell'>";
                            echo "<img src='$image_path' alt='Uploaded Image'>";
                            echo "</div>";
                        }
                    } else {
                        echo "No images uploaded yet.";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
            </div>

        </section>

        <section>
            <div class="col-md-10 offset-md-1 page-wrap">
                <div class="row no-gutters portfolio-topic">
                    <h1 class="profile-sub-topic" id="vaccin">Puppy Vaccination</h1>
                </div>
                <div class="vaccination-container">
                    <div class="vaccine-box">
                        <div class="vaccine-header">
                            <span class="vaccine-name">1st Vaccine</span>
                        </div>
                        <div class="vaccine-content">
                            <p><b>Protect Against:</b></p>
                            <p>Parvovirus</p>
                            <p>Distemper</p>
                            <p>Adenovirus</p>
                            <p>Parainfluenza</p>
                            <p>Bordatella</p>

                        </div>

                        <div class="vaccine-footer">
                            <span class="footer-name">6-8 Week Old</span>
                        </div>

                    </div>
                    <div class="vaccine-box">
                        <div class="vaccine-header">
                            <span class="vaccine-name">2nd Vaccine</span>
                        </div>
                        <div class="vaccine-content">
                            <p><b>Protect Against:</b></p>
                            <p>Parvovirus</p>
                            <p>Distemper</p>
                            <p>Adenovirus</p>
                            <p>Parainfluenza</p>
                            <p>Bordatella</p>


                        </div>

                        <div class="vaccine-footer">
                            <span class="footer-name">10-12 Week Old</span>
                        </div>

                    </div>

                    <div class="vaccine-box">
                        <div class="vaccine-header">
                            <span class="vaccine-name">3rd Vaccine</span>
                        </div>
                        <div class="vaccine-content">
                            <p><b>Protect Against:</b></p>
                            <p>Parvovirus</p>
                            <p>Distemper</p>
                            <p>Adenovirus</p>
                            <p>Parainfluenza</p>
                            <p>Bordatella</p>

                        </div>

                        <div class="vaccine-footer">
                            <span class="footer-name">16-18 Week Old</span>
                        </div>

                    </div>
                </div>
            </div>

        </section>


        <section>
            <div class="col-md-10 offset-md-1 page-wrap">
                <div class="row no-gutters portfolio-topic">
                    <h1 class="profile-sub-topic" id="appointment">Appointments</h1>
                </div>
                <div class="table-container">

                    <table>
                        <tr>
                            <td class="header-cell">Date</td>
                            <td class="header-cell">Time</td>
                            <td class="header-cell">Doctor</td>
                            <th class="header-cell">Delete Appointment</th> <!-- New column for delete button -->
                        </tr>
                        <tr>
                            <td class="data-cell">September 5, 2023</td>
                            <td class="data-cell">10:00 AM</td>
                            <td class="data-cell">Dr. Smith</td>
                            <td class="data-cell"><button class="delete-button" data-appointment-id="1">Delete</button></td> <!-- Delete button added here -->
                        </tr>
                        <tr>
                            <td class="data-cell">September 6, 2023</td>
                            <td class="data-cell">11:30 AM</td>
                            <td class="data-cell">Dr. Johnson</td>
                            <td class="data-cell"><button class="delete-button" data-appointment-id="2">Delete</button></td> <!-- Delete button added here -->
                        </tr>
                        <tr>
                            <td class="data-cell">September 7, 2023</td>
                            <td class="data-cell">2:15 PM</td>
                            <td class="data-cell">Dr. Wilson</td>
                            <td class="data-cell"><button class="delete-button" data-appointment-id="3">Delete</button></td> <!-- Delete button added here -->
                        </tr>

                    </table>
                    <br>
                </div>


        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
