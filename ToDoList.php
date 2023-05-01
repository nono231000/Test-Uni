<?php

class ToDoList {
  private $user;
  private $items;
  private $lastItemCreationDate;

  public function __construct($user) {
      $this->user = $user;
      $this->items = array();
      $this->lastItemCreationDate = null;
  }

  public function canAddItem() {
      return count($this->items) < 10 && ($this->lastItemCreationDate == null || time() - $this->lastItemCreationDate >= 1800);
  }

  public function addItem($item) {
      if ($this->user->isValid() && $this->canAddItem()) {
          $this->items[$item->getName()] = $item;
          $this->lastItemCreationDate = time();

          if (count($this->items) == 8) {
              $emailSender = new EmailSenderService();
              $emailSender->send($this->user->getEmail(), "Vous ne pouvez ajouter que deux éléments à votre ToDoList.");
          }
      }
  }

  public function getItems() {
      return $this->items;
  }
}



?>
