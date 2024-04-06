<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set up the recipient email address
    $to = "zebakhtiyar786@gmail.com"; // Change this to your email address

    // Set up the email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Construct the email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Set up headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for contacting us. We will be in touch shortly.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // If it's not a POST request, redirect back to the contact form page
    header("Location: ../contact.html");
    exit;
}
?>
