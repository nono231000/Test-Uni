<?php
use PHPUnit\Framework\TestCase;

class ToDoListTest extends TestCase {
  public function testIsValid() {
    
    $user = new User("user@example.com", "Dupont", "Nicolas", "Password1", "1990-01-01");
    $this->assertTrue($user->isValid());

    
    $user = new User("userexample.com", "Dupont", "Nicolas", "Password1", "1990-01-01");
    $this->assertFalse($user->isValid());

    
    $user = new User("user@example.com", "Dupont", "Nicolas", "Pw1", "1990-01-01");
    $this->assertFalse($user->isValid());

    
    $user = new User("user@example.com", "Dupont", "Nicolas", "password1", "1990-01-01");
    $this->assertFalse($user->isValid());

    
    $user = new User("user@example.com", "Dupont", "Nicolas", "PASSWORD1", "1990-01-01");
    $this->assertFalse($user->isValid());

    
    $user = new User("user@example.com", "Dupont", "Nicolas", "Password", "1990-01-01");
    $this->assertFalse($user->isValid());

    // Test avec un utilisateur de moins de 13 ans
    $user = new User("user@example.com", "Dupont", "Nicolas", "Password1", "2010-01-01");
    $this->assertFalse($user->isValid());
  }
}
?>
