<?php

require_once(__DIR__ . '/Mailer.php');

class TwoFactorAuth
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    public function generateCode(): string
    {
        return random_int(100000, 999999);
    }

    public function send2FACode($email)
    {
        $code = $this->generateCode();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['2fa_code'] = $code;

        $subject = "Your Two-Factor Authentication Code";
        $body = "<p>Your 2FA code is: <strong>{$code}</strong></p>";

        return $this->mailer->sendEmail($email, $subject, $body);
    }

    public function validateCode($inputCode): bool
    {        
        return isset($_SESSION['2fa_code']) && $_SESSION['2fa_code'] == $inputCode;
    }
}