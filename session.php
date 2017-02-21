<?php

require_once "./inc/functions.php";

if($_POST['password'] && $_POST['password'] == PASSWORD) {
  $_SESSION['macrocounter_logged_in'] = true;
} else {
  unset($_SESSION['macrocounter_logged_in']);
}

header("Location: index.php");
