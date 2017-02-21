<?php

include "./inc/functions.php";

include "./views/header.php";

if(check_login()) {
  $today = load_today();
  $goals = load_settings();
  include "./views/index.php";
} else {
  include "./views/login.php";
}

include "./views/footer.php";
