<?php
try {
    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=furryfam', 'root', '');

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL INSERT statement
    $sql = 'INSERT INTO appointments (vet_id, fullName, email, number, address, petType, appointmentDate, appointmentTime, message) VALUES (:vet_id, :fullName, :email, :number, :address, :petType, :appointmentDate, :appointmentTime, :message)';

    // Initialize variables with default values
    $vet_id = $fullName = $email = $number = $address = $petType = $appointmentDate = $appointmentTime = $message = '';

    // Sanitize and validate user input
    $vet_id = isset($_POST['vet-selection']) ? htmlspecialchars($_POST['vet-selection']) : '';
    $fullName = isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $number = isset($_POST['number']) ? htmlspecialchars($_POST['number']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $petType = isset($_POST['pet-type']) ? htmlspecialchars($_POST['pet-type']) : '';
    $appointmentDate = isset($_POST['appointment-date']) ? htmlspecialchars($_POST['appointment-date']) : '';
    $appointmentTime = isset($_POST['appointment-time']) ? htmlspecialchars($_POST['appointment-time']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    
    
    // Perform form validation
if (
    empty($vet_id) ||
    empty($fullName) ||
    empty($email) ||
    empty($number) ||
    empty($address) ||
    empty($petType) ||
    empty($appointmentDate) ||
    empty($appointmentTime) ||
    empty($message)
) {
    // Set an error message
    $error_message = "Please fill all the fields.";

    // Display the error message
    echo '<script>document.getElementById("validation-errors").innerHTML = "' . $error_message . '";</script>';
} else {
    // All fields are filled, submit the form
    // Your database insertion code here
}


    // Bind the sanitized values from the form to the prepared statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':vet_id', $vet_id);
    $stmt->bindParam(':fullName', $fullName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':petType', $petType);
    $stmt->bindParam(':appointmentDate', $appointmentDate);
    $stmt->bindParam(':appointmentTime', $appointmentTime);
    $stmt->bindParam(':message', $message);

    // Execute the prepared statement
    $stmt->execute();

    // Display a success message to the user
    echo 'Your appointment has been booked successfully!';
} catch (PDOException $e) {
    // Handle any database errors
    echo 'Database error: ' . $e->getMessage();
}

?>
