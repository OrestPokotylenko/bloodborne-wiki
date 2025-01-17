<?php

require_once(__DIR__ . '/Mailer.php');

class ForgotPasswordController {
    private $mailer;

    public function __construct() {
        $this->mailer = new Mailer();
    }

    public function sendResetEmail($email) {
        $subject = 'Reset Password';
        $message = 'Click the link below to reset your password: http://localhost/reset-password?email=' . $email;
        $this->mailer->sendEmail($email, $subject, $message);
    }
}