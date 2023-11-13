<?php

require_once('Mail.php');

class UnsubscriptionMail extends Mail
{

    public function __construct()
    {
        parent::__construct("192.168.1.33", true, "user", "pAss12345");
    }

    public function send($userDTO)
    {
        $htmlMail = file_get_contents("mail-templates/unsubscription.html");
        $htmlMail = str_replace("%name%", $userDTO->name(), $htmlMail);

        if (!$this->sendEmail($userDTO->email(), "Successfully unsubscribed from all services", $htmlMail, true)) {
            // Log the error using custom logger class, here I use the error_log function
            error_log("Couldn't send unsubscription email to " . $userDTO->email(), 3, "/var/tmp/mailer-error.log");
            return false;
        }
        
        return true;
    }
}
