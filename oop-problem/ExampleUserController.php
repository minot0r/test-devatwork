<?php

require_once("Controller.php");
require_once("models/UserDTO.php");
require_once("RegistrationMail.php");
require_once("ForgotPasswordMail.php");
require_once("UnsubscriptionMail.php.php");

/**
 * This controller is responsible for handling the user requests such as registering account,
 * sending forgot password email, unsubscribing from all services, etc.
 * We assume Controller class is a parent class with helper methods
 */
class ExampleUserController extends Controller
{

    /**
     * This method is responsible for handling the register form.
     * 
     * @return JSON
     */
    public function handleRegisterRoute()
    {
        if (!$this->isPostRequest()) {
            return json_encode([
                "status" => "error",
                "message" => "Invalid request method (EXPECTED POST)."
            ]);
        }
        
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
        $password = filter_input(INPUT_POST, 'password');

        if(!$email) {
            return json_encode([
                "status" => "error",
                "message" => "Invalid email address."
            ]);
        }

        $user = new UserDTO($name, $email, $password);
        $user->save();

        // Send welcome email to user
        $mailer = new RegistrationMail();
        $sent = $mailer->send($user);

        return json_encode([
            "status" => "success",
            "message" => "User registered successfully.",
            "mailStatus" => $sent ? "Mail sent successfully." : "Mail couldn't be sent."
        ]);
    }

    /**
     * This method is responsible for handling the forgot password request.
     * 
     * @return void
     */
    public function handleForgotPasswordRoute()
    {
        if (!$this->isPostRequest()) {
            return json_encode([
                "status" => "error",
                "message" => "Invalid request method (EXPECTED POST)."
            ]);
        }

        $email = $_POST["email"];

        $user = UserDTO::findByEmail($email);

        if (!$user) {
            return json_encode([
                "status" => "error",
                "message" => "User not found."
            ]);
        }
        // Send forgot password email to user
        $mailer = new ForgotPasswordMail();
        $sent = $mailer->send($user);

        return json_encode([
            "status" => "success",
            "message" => "User details found.",
            "mailStatus" => $sent ? "Mail sent successfully." : "Mail couldn't be sent."
        ]);
    }

    /**
     * This method is responsible for handling the unsubscribe request.
     * 
     * @return void
     */
    public function handleUnsubscribeRoute()
    {
        if (!$this->isPostRequest()) {
            return json_encode([
                "status" => "error",
                "message" => "Invalid request method (EXPECTED POST)."
            ]);
        }

        $email = $_POST["email"];

        $user = UserDTO::findByEmail($email);

        if (!$user) {
            return json_encode([
                "status" => "error",
                "message" => "User not found."
            ]);
        }

        $user->delete();
        $user->save();

        // Send unsubscribe email to user
        $mailer = new UnsubscriptionMail();
        $sent = $mailer->send($user);

        return json_encode([
            "status" => "success",
            "message" => "User has been unsubscribed.",
            "mailStatus" => $sent ? "Mail sent successfully." : "Mail couldn't be sent."
        ]);
    }
}
