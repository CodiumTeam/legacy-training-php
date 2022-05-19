<?php

namespace App\UseCase;

use App\Model\Email;
use App\Model\EmailsSender;
use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerEmailSender implements EmailsSender
{
    /**
     * @param Email $theEmail
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send(Email $theEmail): void
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp1.example.com;smtp2.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = 'secret';

        $mail->setFrom($theEmail->from);
        $mail->addAddress($theEmail->to);

        $mail->isHTML(true);
        $mail->Subject = $theEmail->subject;
        $mail->Body = $theEmail->body;
//        $mail->send();
    }
}
