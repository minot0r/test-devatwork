<?php

/**
 * Class Mail
 *
 */
abstract class Mail
{
    /**
     * Indicates if the connection to the mail server requires authentication
     * @var <boolean>
     */
    private $authentication;

    /**
     * Indicates the host where the connection to the mail server will be made.
     * @var <string>
     */
    private $host;

    /**
     * Specifies the user to be used for authentication with the mail server.
     * @var <string>
     */
    private $user;

    /**
     * Specifies the password to be used for authentication with the mail server.
     * @var <string>
     */
    private $password;

    /**
     * Function to configure the mail server
     * @param <string> $host Is the host where the connection to the mail server will be made.
     * @param <boolean> $authentication Indicates if the connection to the mail server requires authentication
     * @param <string> $user Optional. Is the user to be used for authentication with the mail server.
     * @param <string> $password Optional. Is the password to be used for authentication with the mail server.
     * @return <Mail|null> Returns null if the connection to the mail server fails or an instance of Mail class
     */

    public function __construct($host, $authentication = false, $user = null, $password = null)
    {
        $this->host = $host;
        $this->authentication = $authentication;
        $this->user = $user;
        $this->password = $password;

        try {
            // Build the connection to the mail server
        } catch (Exception $e) {
            // Log the error using custom logger class, here I use the error_log function
            error_log("Couldn't connect to mail server (using auth? $authentication) $user:$password@$host", 3, "/var/tmp/mailer-error.log");
        } finally {
            return null;
        }
    }

    /** 
     * Abstract method to send the email
     * @param <UserDTO> $userDTO Is the user data transfer object
     * @return <boolean> Returns true if email is sent else returns false
     */
    public abstract function send($userDTO);

    /**
     * Send the email
     * @param <string> $to Is the recipient's email address
     * @param <string> $subject This is the subject of the message.
     * @param <string> $body Is the message body
     * @param <boolean> $is_html Indicates if the message body is in html format
     * @param <array> $para_cc An array of email addresses for Cc copy.
     * @param <array> $para_bcc An array of email addresses for copy Bcc
     * @return <boolean> Returns true if email is sent and throws an exception on failure
     */
    protected function sendEmail(
        $to,
        $subject,
        $body,
        $is_html = false,
        array $para_cc = array(),
        array $para_bcc = array()
    ) {
        //... Sends the email and returns true if everything went well orthrows an exception if it fails
    }

}
