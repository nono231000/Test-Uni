<?php
use PHPUnit\Framework\TestCase;

class UserBisBisTest extends TestCase {
    
    public function testAddItem() {
        $user = new UserBisBis("DUPONT Nicolas");
        $item1 = new Item("Item 1", "Content 1");
        $item2 = new Item("Item 2", "Content 2");
        $user->addItem($item1);
        $user->addItem($item2);
        $this->assertEquals(2, count($user->getTodoList()->getItems()));
    }
    
    public function testAddInvalidUser() {
        $user = new UserBisBis("");
        $item = new Item("Item 1", "Content 1");
        $this->expectException(Exception::class);
        $user->addItem($item);
    }
    
    public function testAddDuplicateItem() {
        $user = new UserBisBis("DUPONT Nicolas");
        $item1 = new Item("Item 1", "Content 1");
        $item2 = new Item("Item 1", "Content 2");
        $user->addItem($item1);
        $this->expectException(Exception::class);
        $user->addItem($item2);
    }
    
    public function testAddTooManyItems() {
        $user = new UserBisBis("DUPONT Nicolas");
        $item1 = new Item("Item 1", "Content 1");
        $item2 = new Item("Item 2", "Content 2");
        $item3 = new Item("Item 3", "Content 3");
        $item4 = new Item("Item 4", "Content 4");
        $item5 = new Item("Item 5", "Content 5");
        $item6 = new Item("Item 6", "Content 6");
        $item7 = new Item("Item 7", "Content 7");
        $item8 = new Item("Item 8", "Content 8");
        $item9 = new Item("Item 9", "Content 9");
        $item10 = new Item("Item 10", "Content 10");
        $user->addItem($item1);
        $user->addItem($item2);
        $user->addItem($item3);
        $user->addItem($item4);
        $user->addItem($item5);
        $user->addItem($item6);
        $user->addItem($item7);
        $user->addItem($item8);
        $user->addItem($item9);
        $this->expectException(Exception::class);
        $user->addItem($item10);
    }
    
    public function testAddDuplicateItemWithSameList() {
        $user = new UserBisBis("DUPONT Nicolas");
        $item1 = new Item("Item 1", "Content 1");
        $item2 = new Item("Item 2", "Content 2");
        $user->addItem($item1);
        sleep(1800);
        $this->expectException(Exception::class);
        $user->addItem($item2);
    }
    
    public function testAddDuplicateItemWithDifferentLists() {
        $user1 = new UserBisBis("DUPONT Nicolas");
        $user2 = new UserBisBis("Jane Doe");
        $item1 = new Item("Item 1", "Content 1");
        $user1->addItem($item1);
        sleep(1800);
        $item2 = new Item("Item 1", "Content 2");
        $user2->addItem($item2);
        $this->assertEquals(1, count($user1->getTodoList()->getItems()));
        $this->assertEquals(1, count($user2->getToDoList()->getItems()));
    }
}
?>
