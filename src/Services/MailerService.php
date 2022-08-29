<?php
namespace App\Services;

/***************************
 * ----- Mail Service -----
 ***************************/
/**
 * We will use this service to manage all emails functions
 * During developement we will refactor code and functions that handle all kind of mails directly in this service
 * Also, we will make it better as times goes on
 */

class MailerService
{

    protected $email_sender;
    protected $email_receiver;

    public function __construct($email_sender = null, $email_receiver = null)
    {
        if ($email_sender !== null && $email_receiver !== null) {
            $this->email_sender = $email_sender;
            $this->email_receiver = $email_receiver;
        }
        else {
            $this->email_sender = "admin@colibrile.com";
        }
    }

    /**
     * Send email to the given email or to the service email_receiver address
     * Takes a subject and a content as parameters
     * For now, mail is commented out because we dont have a functionning mail address as of today
     * To make it work, simply uncomment it
     */
    public function sendEmail($email = null, $subject, $content)
    {
        // message
        $message = "
            <html>
                <head>
                    <title>$subject</title>
                </head>
                <body>
                    $content
                </body>
            </html>
        ";

        // To send HTML, Content-type headers must be defined
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = "Reply-To: {$this->email_sender}";
        $headers[] = 'From: Colibrile <'. $this->email_sender .'>';

        // Additionnal headers
        $to = $email != null ? $email : $this->email_receiver;
        $headers[] = 'To: ' . $to;

        // Send mail - Uncomment to send real mails
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    /**
     * @return mixed
     */
    function getEmail_sender()
    {
        return $this->email_sender;
    }

    /**
     * @param mixed $email_sender 
     * @return mailerService
     */
    function setEmail_sender($email_sender): self
    {
        $this->email_sender = $email_sender;
        return $this;
    }
    /**
     * @return mixed
     */
    function getEmail_receiver()
    {
        return $this->email_receiver;
    }

    /**
     * @param mixed $email_receiver 
     * @return mailerService
     */
    function setEmail_receiver($email_receiver): self
    {
        $this->email_receiver = $email_receiver;
        return $this;
    }
}
