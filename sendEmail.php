<?php
// Import the PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; // 0 = off, 1 = client messages, 2 = client and server messages
    $mail->isSMTP();
    $mail->Host = 'amalvalley1.amirul-hub.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'amalvalley@amalvalley1.amirul-hub.com'; // SMTP username
    $mail->Password = 'amirulakmal'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('amalvalley@amalvalley1.amirul-hub.com', 'Amal Valley');
    $mail->addAddress($_GET['email'], $_GET['name']); // Add a recipient
    $mail->addReplyTo('amalvalley@amalvalley1.amirul-hub.com', 'Information');

    // Content
    $mail->isHTML(true); // Set email format to plain text
    $mail->Subject = 'Donation at Amal Valley Organization';
    $mail->Body = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width,initial-scale=1"> <title>Support Amal Valley - Donate Today</title> <style>body{font-family:Arial,sans-serif;margin:0;padding:0}.container{max-width:600px;margin:0 auto;padding:20px}.header{background-color:#007bff;color:#fff;padding:20px;text-align:center}.content{padding:20px}.footer{background-color:#f5f5f5;padding:10px;text-align:center;font-size:14px}</style> </head> <body> <div class="container"> <div class="header"> <h1>Support Amal Valley</h1> </div> <div class="content"> <h2>Help Us Make a Difference</h2> <p>Amal Valley is a non-profit organization dedicated to improving the lives of underprivileged communities in Malaysia. Your donation can help us continue our important work and make a lasting impact.</p> <h3>Your Contribution Matters</h3> <p>Every donation, no matter how small, can make a significant difference. Your support helps us provide essential services, such as:</p> <ul> <li>Education and skills training</li> <li>Healthcare and nutritional assistance</li> <li>Community development projects</li> <li>Disaster relief and emergency aid</li> </ul> <h3>Donate Today</h3> <p>Please consider making a donation to Amal Valley. Your generosity will help us continue our mission and create a brighter future for those in need.</p> <a href="https://amalvalley.com/kempen/" style="display:inline-block;background-color:#007bff;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px">Donate Now</a> </div> <div class="footer"> <p>&copy; 2023 Amal Valley. All rights reserved.</p> </div> </div> </body> </html>';

    // Send the message
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}