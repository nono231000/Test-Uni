<?php
class EmailSenderService {

    private $mailer;

    public function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $subject, string $recipient, string $content) {
        $message = (new \Swift_Message($subject))
            ->setFrom('user@example.com')
            ->setTo($recipient)
            ->setBody($content);

        $this->mailer->send($message);
    }
}

?>