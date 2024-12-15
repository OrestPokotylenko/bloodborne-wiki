<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class Mailer 
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "testsender302@gmail.com";
        $this->mail->Password = "tdbg hldx dakp dylq";
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = "587";
    }

    public function sendEmail($to, $subject, $body)
    {
        try {
            $this->mail->setFrom($this->mail->Username, 'Bloodborne Wiki');
            $this->mail->addAddress($to);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$this->mail->ErrorInfo}");
            return false;
        }
    }
}