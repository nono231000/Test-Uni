<?php
use PHPUnit\Framework\TestCase;
use EmailSenderService\EmailSenderService;


class ToDoListTest extends TestCase {
  public function testAddItem() {
    $user = new UserBisBis('DUPONT Nicolas', 'user@example.com');
    $emailSenderServiceMock = $this->createMock(EmailSenderService::class);
    $emailSenderServiceMock->expects($this->once())
                           ->method('send')
                           ->with($this->equalTo('user@example.com'), $this->equalTo('Limite d\'items atteinte'), $this->equalTo('Vous ne pouvez plus ajouter que 2 items à votre ToDoList.'));

    $todoList = new ToDoList($user, $emailSenderServiceMock);

    // Ajouter un premier item
    $item1 = new Item('Item 1', 'Contenu de l\'item 1', time());
    $this->assertNull($todoList->add($item1));
    $this->assertCount(1, $todoList->getItems());

    // Ajouter un deuxième item après plus de 30 min
    $item2 = new Item('Item 2', 'Contenu de l\'item 2', time() + 1801);
    $this->assertNull($todoList->add($item2));
    $this->assertCount(2, $todoList->getItems());

    // Ajouter un troisième item avec le même nom qu'un item existant (devrait lancer une exception)
    $item3 = new Item('Item 1', 'Contenu de l\'item 3', time() + 3601);
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Un item avec ce nom existe déjà.');
    $todoList->add($item3);

    // Ajouter 7 items supplémentaires
    $items = array();
    for ($i = 3; $i <= 9; $i++) {
      $items[] = new Item("Item $i", "Contenu de l'item $i", time() + 3601 + ($i - 3) * 1800);
      $this->assertNull($todoList->add($items[$i - 3]));
      $this->assertCount($i, $todoList->getItems());
    }

    // Ajouter un 10ème item (devrait lancer une exception)
    $item10 = new Item('Item 10', 'Contenu de l\'item 10', time() + 3601 + 7 * 1800);
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Impossible d\'ajouter un item à cette ToDoList.');
    $todoList->add($item10);

    // Ajouter deux items supplémentaires après réception de l'email
    $item11 = new Item('Item 11', 'Contenu de l\'item 11', time() + 3601 + 8 * 1800);
    $this->assertNull($todoList->add($item11));
    $this->assertCount(10, $todoList->getItems());

    $item12 = new Item('Item 12', 'Contenu de l\'item 12', time() + 3601 + 9 * 1800);
    $this->assertNull($todoList->add($item12));
    $this->assertCount(10, $todoList->getItems());
  }
}
?>