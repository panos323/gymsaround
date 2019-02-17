<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailer() {
    $mail = new PHPMailer(true);
    try {
        // Server Settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'titan.indns.gr';                             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                     // Enable SMTP authentication
        $mail->Username = 'info@georgegeorgakas.com';               // SMTP username
        $mail->Password = 'georgeGeorgakas';                        // SMTP password
        $mail->SMTPSecure = true;                                   // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 465;                                          // TCP port to connect to

        // Recipients
        $mail->setFrom('12467gr@saeinstitute.edu', 'First Last');
        $mail->addAddress('georgegeorgakas13@hotmail.com', 'George Georgakas');


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
