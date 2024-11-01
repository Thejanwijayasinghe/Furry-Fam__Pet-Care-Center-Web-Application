<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "iit20015@std.uwu.ac.lk";

    // Set email subject
    $subject = "New Contact Form Submission from PetCare";

    // Compose the email message
    $emailMessage = "Full Name: $fullName\n";
    $emailMessage .= "Email Address: $email\n\n";
    $emailMessage .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $emailMessage, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    echo "Access denied.";
}
?>


