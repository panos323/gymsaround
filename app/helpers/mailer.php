<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailer($attrs) {
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
        $mail->setFrom($attrs['sender_email'], $attrs['full_name']);
        $mail->addAddress($attrs['receiver_email'], $attrs['receiver_name']);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $attrs['subject'];
        $mail->Body    = $attrs['message'];
        $mail->AltBody = $attrs['message'];

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
