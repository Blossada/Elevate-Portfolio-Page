<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Your email address where you want to receive messages
    $recipient = "blossom6205@gmail.com";

    // Email subject
    $subject = "New contact from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $name <$email>";

    // Send email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Success
        echo "Thank you! Your message has been sent.";
    } else {
        // Failure
        echo "Oops! Something went wrong, please try again.";
    }
} else {
    // Not a POST request
    echo "There was a problem with your submission.";
}
?>
