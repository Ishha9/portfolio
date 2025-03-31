<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Set recipient email (the email address where you want to receive the enquiry)
    $to = "ipmore21@gmail.com"; // Replace with your email address
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Construct the email body
    $email_subject = "Enquiry: " . $subject;
    $email_body = "You have received a new enquiry from " . $name . ".\n\n" .
                  "Here are the details:\n\n" .
                  "Name: " . $name . "\n" .
                  "Email: " . $email . "\n" .
                  "Subject: " . $subject . "\n" .
                  "Message: " . $message . "\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for your enquiry! We will get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
}
?>
