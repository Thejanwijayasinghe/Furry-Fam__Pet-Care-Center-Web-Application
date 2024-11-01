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
