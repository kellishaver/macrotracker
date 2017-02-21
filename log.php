<?php

require_once "./inc/functions.php";

if(check_login()) {
  if(isset($_POST['food'])) {
    if(log_entry($_POST['food'])) {
      header("Location: index.php");
    } else {
      include "./views/header.php";
      include "./views/log.php";
      include "./views/footer.php";
    }
  } else {
    include "./views/header.php";
    include "./views/log.php";
    include "./views/footer.php";
  }
} else {
  include "./views/header.php";
  include "./views/login.php";
  include "./views/footer.php";
}
