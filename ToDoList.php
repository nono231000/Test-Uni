<?php

class ToDoList {

  private string $content;
  private Carbon $date_creation;
//   private $email;
//   private $firstname;
//   private $lastname;
//   private $password;
//   private $birthdate;

//   function __construct($email, $firstname, $lastname, $password, $birthdate) {
//     $this->email = $email;
//     $this->firstname = $firstname;
//     $this->lastname = $lastname;
//     $this->password = $password;
//     $this->birthdate = $birthdate;
//   }

//   public function isValid() {
//     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
//       return false;
//     }

//     if(strlen($this->password) < 8 || strlen($this->password) > 40) {
//       return false;
//     }

//     if(!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password) || !preg_match('/[0-9]/', $this->password)) {
//       return false;
//     }

//     $birthdate = new DateTime($this->birthdate);
//     $today = new DateTime();
//     $age = $today->diff($birthdate)->y;

//     if($age < 13) {
//       return false;
//     }

//     return true;
//   }
// }

// $email = "user@example.com";
// $firstname = "Dupont";
// $lastname = "Nicolas";
// $password = "Password1";
// $birthdate = "1990-01-01";

// $user = new User($email, $firstname, $lastname, $password, $birthdate);

// if($user->isValid()) {
//   // Créer la ToDoList pour l'utilisateur
//   echo "Utilisateur valide. La ToDoList peut être créée.";
// } else {
//   echo "L'utilisateur n'est pas valide. La ToDoList ne peut pas être créée.";
}
?>
