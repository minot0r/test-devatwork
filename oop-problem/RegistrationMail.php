<?php

require_once('Mail.php');

class RegistrationMail extends Mail
{

    public function __construct()
    {
        parent::__construct("192.168.1.66", true, "registration", "r3g1str0");
    }

    public function send($userDTO)
    {
        $htmlMail = file_get_contents("mail-templates/registration.html");
        // Replace the placeholders with the real values
        $htmlMail = str_replace("%name%", $userDTO->name(), $htmlMail);

        if (!$this->sendEmail($userDTO->email(), "Account successfully created", $htmlMail, true)) {
            // Log the error using custom logger class, here I use the error_log function
            error_log("Couldn't send registration email to " . $userDTO->email(), 3, "/var/tmp/mailer-error.log");
            return false;
        }
        return true;
    }
}
