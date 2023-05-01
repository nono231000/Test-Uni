<?php

class EmailSenderServiceTest extends PHPUnit\Framework\TestCase {
    public function testSendEmail() {
        $user = new UserBisBis("Nicolas.Dupont@example.com", "Nicolas", "Dupont", "P@ssword1", "1990-01-01");
        $emailSender = new EmailSenderService('');

        // Test sending email
        $emailSender->sendEmail("Email","Email Test", "Voici un test email.");
        $this->expectOutputString("Email envoyé à Nicolas.Dupont@example.com avec pour objet 'Email Test' et message 'Voici un test email.'\n");
    }
}
?>