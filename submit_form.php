<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;

require 'vendor/autoload.php';

function send_email($name, $email, $message) {
    try {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'embadi43@gmail.com';                 // SMTP username
        $mail->Password   = 'ozsw krxk pwlx lmrl';                        // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('embadi43@gmail.com', 'Mailer');
        $mail->addAddress($email, 'New User');            // Add a recipient
    
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Email Testing';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b> <br>'.$message.'<br><br>From: '.$name;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients. Message: '.$message;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $interests = isset($_POST['interests']) ? $_POST['interests'] : [];

    // Process the checkbox list
    $interestsString = implode(", ", $interests);

    // Prepare the email body with the checkbox list
    $email_body = "Name: " . htmlspecialchars($name) . "\n";
    $email_body .= "Email: " . htmlspecialchars($email) . "\n";
    $email_body .= "Message: " . htmlspecialchars($message) . "\n";
    $email_body .= "Interests: " . htmlspecialchars($interestsString) . "\n";

    // Send email or other processing
    // ...

    echo "Received the following data:<br>";
    $body = nl2br(htmlspecialchars($email_body));

    // Call the send_email function
    send_email($name, $email, $body);

    // Redirect to a thank-you page, or a back to  the form.

    // 
}
?>

