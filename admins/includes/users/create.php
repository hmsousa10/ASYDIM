<?php

require "../../../vendor/autoload.php";

include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

@session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$role = $_POST["role"];

$statement = "SELECT * FROM roles WHERE id = $role";
$role_query = my_query($statement);

if (count($role_query) <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=1");
    return;
}

$generated_password = generate_password(8);
$password = password_hash($generated_password, PASSWORD_DEFAULT);

$query = my_query(
    "INSERT INTO `users`(`name`, `email`, `phone`, `password`, `role_id`) VALUES ('$name','$email','$phone','$password','$role')"
);

send_email($name, $email, $generated_password);

header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=0");

function generate_password($length = 10)
{
    $characters =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters);
    $randomString = "";

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}

/**
 * This function takes care of sending an email with
 * the user's password after the account is created
 */
function send_email($name, $email, $password)
{
    $subject = "Boas vindas, somos a ASYDIM!";
    $content = generate_body($password);

    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = "sandbox.smtp.mailtrap.io";

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 2525;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "672c0673b8daf6";

    //Password to use for SMTP authentication
    $mail->Password = "95987db4a77aa1";

    //Set who the message is to be sent from
    $mail->setFrom("hi@asydim.pt", "ASYDIM");

    //Set who the message is to be sent to
    $mail->addAddress($email, $name);

    //Set the subject line
    $mail->Subject = $subject;

    $mail->isHTML(true);
    $mail->Body = $content;

    //Replace the plain text body with one created manually
    $mail->AltBody = "";

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        die();
    } else {
        echo "Message sent!";
    }
}

function generate_body($password)
{
    return "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Conta criada com sucesso</title>
        <link rel='stylesheet' type='text/css' href='../css/main.css' />
        <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
        <style>
            * {
            margin: 0 auto;
            }

            .banner {
            display: flex;
            justify-content: center;
            text-align: center;
            color: white;
            background-color: #4C9F70;
            width: 100%;
            height: 8vh;
            }

            .banner h2 {
            margin-top: auto;
            margin-bottom: auto;
            }

            .content {
            padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class='banner'>
            <h2>ASYDIM</h2>
        </div>
        <div class='content'>
            <p>Ol&aacute;!</b></p>
            <p>A sua conta foi criada com sucesso, utilizando este e-mail e a password: $password</p>
            <p>Obrigado por estar connosco! Atenciosamente,</p>
            <b>ASYDIM</b>
        </div>
    </body>
    </html>";
}
