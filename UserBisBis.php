<?php

use EmailSenderService\EmailSenderService;

class UserBisBis {
  private $username;
  private $todolist;

  public function __construct($username) {
    $this->username = $username;
    $this->todolist = new ToDoList();
  }

  public function getUsername() {
    return $this->username;
  }

  public function getToDoList() {
    return $this->todolist;
  }

  public function isValid() {
    // Si User est valide
    // Retourne true si valide, false sinon
  }
}

class ToDoList {
    private $items = array();
    private $lastItemDate = 0;
    private $user;
    private $emailSenderService;
  
    public function __construct(UserBisBis $user, EmailSenderService $emailSenderService) {
      $this->user = $user;
      $this->emailSenderService = $emailSenderService;
    }
  
    public function add(Item $item) {
      if ($this->user->isValid() && count($this->items) < 10 && (time() - $this->lastItemDate) >= 1800) {
        // Si Item a été ajouté
        foreach ($this->items as $existingItem) {
          if ($existingItem->getName() === $item->getName()) {
            throw new Exception('Un item avec ce nom existe déjà.');
          }
        }
  
        $this->items[] = $item;
        $this->lastItemDate = time();
  
        if (count($this->items) === 8) {
          $this->emailSenderService->send($this->user->getEmail(), 'Limite d\'items atteinte', 'Vous ne pouvez plus ajouter que 2 items à votre ToDoList.');
        }
      } else {
        throw new Exception('Impossible d\'ajouter un item à cette ToDoList.');
      }
    }
  }
  

class Item {
  private $name;
  private $content;
  private $creationDate;

  public function __construct($name, $content) {
    $this->name = $name;
    $this->content = $content;
    $this->creationDate = time();
  }

  public function getName() {
    return $this->name;
  }

  public function getContent() {
    return $this->content;
  }

  public function getCreationDate() {
    return $this->creationDate;
  }
}

?>
