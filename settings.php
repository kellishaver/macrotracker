<?php

require_once "./inc/functions.php";

if(check_login()) {
  $settings = load_settings();

  if(isset($_POST['settings'])) {
    if(update_settings($_POST['settings'])) {
      header("Location: index.php");
    } else {
      include "./views/header.php";
      include "./views/settings.php";
      include "./views/footer.php";
    }
  } else {
    include "./views/header.php";
    include "./views/settings.php";
    include "./views/footer.php";
  }
} else {
  include "./views/header.php";
  include "./views/login.php";
  include "./views/footer.php";
}
