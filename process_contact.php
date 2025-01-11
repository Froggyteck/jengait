<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // Email configuration
        $to = "emmanuelmuhindi019@gmail.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "<p style='color: green;'>Your message has been sent successfully!</p>";
        } else {
            echo "<p style='color: red;'>Failed to send the message. Please try again later.</p>";
        }
    } else {
        echo "<p style='color: red;'>Please fill out all required fields.</p>";
    }
} else {
    echo "<p style='color: red;'>Invalid request method.</p>";
}
?>