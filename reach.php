<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if (isset($_POST['submit'])) {

    extract($_POST);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                      // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'Sender@gmail.com'; // SMTP username
        $mail->Password   = '';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587;              // TCP port to connect to

        //Recipients
        $mail->setFrom('sender@gmail.com', $name);
        $mail->addAddress('reciever@gmail.com', 'Aditya'); // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Portfolio Mail';
        $mail->Body    = 'Name:- ' . $name . '<br>Email:-' . $email . '<br>Message:-' . $message;

        $mail->send();
        echo "<script>alert('The message is sent')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aditya Sharma - Portfolio</title>
    <link rel="stylesheet" href="reach.css">
    <script src="https://kit.fontawesome.com/08a1d1d5aa.js" crossorigin="anonymous"></script>
    <script src="reach.js"></script>
</head>

<body onload="bigger()">
    <div class="cursor"></div>

    <div class="loader1" id="loader1">
        <img src="loader.gif" alt="Loading...">
    </div>
    <div class="loader" id="loader">
        <img src="loader.gif" alt="Loading...">
    </div>

    <div class="head">
        <div class="button">
            <form class="formbtn" action="Index.html"><button class="cs">Home</button></form>
            <form class="formbtn" action="skills.html"><button class="workw">Highlights</button></form>
        </div>
    </div>

    <div class="contact-section">
        <h2 class="contact-heading">Contact Me</h2>
        <form class="contact-form" method="post" onsubmit="showLoader()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button name="submit" type="submit" class="contact-submit">Send Message</button>
        </form>
    </div>

    <div class="end">
        <div class="right">
            <div class="lg">
                <a href="https://www.instagram.com/r09_aditya/" target="_blank">
                    <i class="fab fa-instagram social-icon"></i>
                </a>
                <a href="https://www.linkedin.com/in/r09aditya" target="_blank">
                    <i class="fab fa-linkedin social-icon"></i>
                </a>
                <a href="https://github.com/R09Aditya" target="_blank">
                    <i class="fab fa-github social-icon"></i>
                </a>
                <a href="https://x.com/r09_aditya?t=V-40wr5xvvnZSNHU5_fY9Q&s=08" target="_blank">
                    <i class="fab fa-x-twitter social-icon"></i>
                </a>
                <a href="https://www.threads.net/@r09_aditya" target="_blank">
                    <i class="fab fa-threads social-icon"></i>
                </a>
            </div>
            <h4 class="copy">Designed by: Aditya Sharma</h4>
        </div>
    </div>

    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'flex';
        }




        function bigger() {
            var foo = setInterval(function() {
                document.getElementById('loader1').style.display = 'none';
                // document.getElementById('loader').style.height = 0 + 'px';
            }, 1000);
        }
    </script>
</body>

</html>