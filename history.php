<?php

require_once "./inc/functions.php";

include "./views/header.php";

if(check_login()) {
  $history = load_recent_history();
  include "./views/history.php";
} else {
  include "./views/login.php";
}

include "./views/footer.php";
