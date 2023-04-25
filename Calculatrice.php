<?php

class Calculatrice {
    public function add($a, $b) {
      return $a + $b;
    }
  
    public function sub($a, $b) {
      return $a - $b;
    }
  
    public function mul($a, $b) {
      return $a * $b;
    }
  
    public function div($a, $b) {
      if ($b == 0) {
        throw new Exception("Division par zéro");
      }
      return $a / $b;
    }

    public function avg($numbers) {
      $sum = array_sum($numbers);
      $count = count($numbers);
      if ($count == 0) {
        throw new Exception("Impossible de calculer la moyenne d'un tableau vide");
      }
      return $sum / $count;
    }
  }
  























  
  // Exemple d'utilisation
  $calc = new Calculatrice();
  echo $calc->add(3, 5); // Affiche 8
  echo $calc->sub(10, 4); // Affiche 6
  echo $calc->mul(2, 6); // Affiche 12
  echo $calc->div(10, 2); // Affiche 5
  echo $calc->avg([1, 2, 3, 4, 5]); // Affiche 3
  

?>