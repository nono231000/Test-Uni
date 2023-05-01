<?php
use Symfony\Component\Translation\Exception\InvalidArgumentException;

class UserBisBisTest extends PHPUnit\Framework\TestCase {
    public function testCreateUser() {
         /**
        * @expectedException PHPUnit\Framework\Error\Error
        */
        
        $this->expectException(InvalidArgumentException::class);
        $user1 = new UserBisBis("Nicolas.Dupont.example.com", "Nicolas", "Dupont", "P@ssword1", "1990-01-01");

        
        $this->expectException(InvalidArgumentException::class);
        $user3 = new UserBisBis("jane.Dupont@example.com", "", "Dupont", "P@ssword1", "1995-05-05");

        
        $this->expectException(InvalidArgumentException::class);
        $user4 = new UserBisBis("jane.Dupont@example.com", "Jane", "", "P@ssword1", "1995-05-05");

        
        $this->expectException(InvalidArgumentException::class);
        $user5 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "P@ss1", "1995-05-05");

        
        $this->expectException(InvalidArgumentException::class);
        $user6 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "P@ssword1P@ssword1P@ssword1P@ssword1", "1995-05-05");

       
        $this->expectException(InvalidArgumentException::class);
        $user7 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "password", "1995-05-05");

        
        $this->expectException(InvalidArgumentException::class);
        $user8 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "P@ssword1", "");

        
        $this->expectException(InvalidArgumentException::class);
        $user9 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "P@ssword1", date('Y-m-d', strtotime('-12 years')));

        
        $user10 = new UserBisBis("jane.Dupont@example.com", "Jane", "Dupont", "P@ssword1", date('Y-m-d', strtotime('-30 years')));
        $this->assertTrue($user10->isValid());
    }
}
?>