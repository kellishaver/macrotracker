<?php

session_start();

define('DEBUG', TRUE);
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
define('PASSWORD', '');

if (DEBUG) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

date_default_timezone_set('America/New_York');
ini_set('session.gc_maxlifetime', 60*60*24*365);
session_set_cookie_params(60*60*24*365);

$dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

//-----

function check_login() {
  if(isset($_SESSION['macrocounter_logged_in']) && $_SESSION['macrocounter_logged_in'] == true) {
    return true;
  } else {
    return false;
  }
}

//-----

function load_all_history() {
  global $dbh;

  $sth = $dbh->prepare('SELECT * FROM entries ORDER BY created_at DESC');
  $query = $sth->execute();
  $history = $sth->fetchAll(PDO::FETCH_OBJ);

  return $history;
}

//-----

function load_recent_history() {
  global $dbh;

  $two_weeks_ago = date('Y-m-d 0:0:0', time() - 14 * 86400);

  $sth = $dbh->prepare('SELECT * FROM entries WHERE created_at >= :two_weeks_ago ORDER BY created_at DESC');
  $sth->bindParam(':two_weeks_ago', $two_weeks_ago);
  $query = $sth->execute();
  $results = $sth->fetchAll(PDO::FETCH_OBJ);

  $history = array();

  $day = "";
  foreach($results as $entry) {
    $c_arr = explode(" ", $entry->created_at);
    $created = $c_arr[0];
    $history[$created][] = $entry;
  }

  return $history;
}

//-----

function load_settings() {
  global $dbh;
  $settings = array();
  $sth = $dbh->prepare('SELECT * FROM settings');
  $query = $sth->execute();
  $rows = $sth->fetchAll(PDO::FETCH_OBJ);
  foreach($rows as $row) {
    $settings[$row->key] = $row->value;
  }
  return (object) $settings;
}

//-----

function load_today() {
  global $dbh;
  $today = new stdClass();
  $today->calories = 0;
  $today->fats = 0;
  $today->proteins = 0;
  $today->carbs = 0;
  $today->foods = NULL;

  $start_time = date('Y-m-d 0:0:0');
  $end_time = date('Y-m-d 23:23:59');

  $sth = $dbh->prepare('SELECT * FROM entries WHERE created_at >= :start_time AND created_at <= :end_time ORDER BY created_at ASC');
  $sth->bindParam(':start_time', $start_time);
  $sth->bindParam(':end_time', $end_time);
  $query = $sth->execute();
  $rows = $sth->fetchAll(PDO::FETCH_OBJ);
  $today->foods = $rows;
  foreach($rows as $row) {
    $today->calories += $row->calories;
    $today->proteins += $row->proteins;
    $today->fats += $row->fats;
    $today->carbs += $row->carbs;
  }

  return $today;
}

//-----

function log_entry($food) {
  global $dbh;
  $food = (object) $food;
  $sth = $dbh->prepare("INSERT INTO entries (`food`, `calories`, `fats`, `proteins`, `carbs`) VALUES (:food, :calories, :fats, :proteins, :carbs)");
  $sth->bindParam(':food', $food->food);
  $sth->bindParam(':calories', $food->calories);
  $sth->bindParam(':fats', $food->fats);
  $sth->bindParam(':proteins', $food->proteins);
  $sth->bindParam(':carbs', $food->carbs);
  try {
    $result = $sth->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  $id = $dbh->lastInsertId();
  return $id;
}

//-----

function update_settings($settings) {
  global $dbh;
  foreach($settings as $key=>$val) {
    $sth = $dbh->prepare("UPDATE settings SET `value` = :val WHERE `key` = :key");
    $sth->bindParam(':key', $key);
    $sth->bindParam(':val', $val);
    try {
      $sth->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }    
  }
  return true;
}

