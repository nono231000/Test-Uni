<?php

use EmailSenderService\EmailSenderService;

class ToDoList {
  private $items = array();
  private $lastItemDate = 0;
  private $user;
  private $emailSenderService;

  public function __construct(User $user, EmailSenderService $emailSenderService) {
    $this->user = $user;
    $this->emailSenderService = $emailSenderService;
  }

  public function add(Item $item) {
    if ($this->user->isValid() && count($this->items) < 10 && (time() - $this->lastItemDate) >= 1800) {
      // Vérifier si l'item a déjà été ajouté
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

?>
