<?php

include "./inc/functions.php";

if(check_login()) {
  header( 'Content-Type: text/csv' );
  header( 'Content-Disposition: attachment;filename=food_history.csv');
  $history = load_all_history();
  //var_dump($history);

  $fp = fopen('php://output', 'w');
  fputcsv($fp, array('Food', 'Calories', 'Net Carbs', 'Proteins', 'Fats'));
  foreach($history as $day) {
    fputcsv($fp, array($day->food, $day->calories, $day->carbs, $day->proteins, $day->fats));
  }
  fclose($fp);  
} else {
  include "./views/header.php";
  include "./views/login.php";
  include "./views/footer.php";
}

