<?php

require_once('Mail.php');

class ForgotPasswordMail extends Mail
{

    public function __construct()
    {
        parent::__construct("192.168.1.22");
    }

    public function send($userDTO)
    {
        $textMail = file_get_contents("mail-templates/forgot-password.txt");
        $textMail = str_replace("%username%", $userDTO->username(), $textMail);
        $textMail = str_replace("%password%", $userDTO->password(), $textMail);

        if(!$this->sendEmail($userDTO->email(), "Your forgotten credentials", $textMail)) {
            // Log the error using custom logger class, here I use the error_log function
            error_log("Couldn't send forgot password email to " . $userDTO->email(), 3, "/var/tmp/mailer-error.log");
            return false;
        }

        return true;
    }
}
