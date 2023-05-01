<?php
use Symfony\Component\Translation\Exception\InvalidArgumentException;

class ToDoListTest extends PHPUnit\Framework\TestCase {
  public function testCreateToDoList() {
      $user = new UserBisBis("Nicolas.Dupont@example.com", "Nicolas", "Dupont", "P@ssword1", "1990-01-01");
      $toDoList = new ToDoList($user);

      
      $item = new Item("Achat de lait", "2 litre de lait", date('Y-m-d H:i:s'));
      $toDoList->addItem($item);
      $this->assertEquals(1, count($toDoList->getItems()));

     
      $this->expectException(InvalidArgumentException::class);
      $item2 = new Item("Achat du pain", "un pain de mie", date('Y-m-d H:i:s'));
      $toDoList->addItem($item2);

      
      sleep(1801);
      $toDoList->addItem($item2);
      $this->assertEquals(2, count($toDoList->getItems()));
  }
}
?>