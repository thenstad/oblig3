<?php
  $db_host = '127.0.0.1';
  $db_database = 'oblig3_v3';
  $db_user = 'root';
  $db_pw = '';

  try { // Attempt a connection to the database
    $db = new PDO("mysql:host=$db_host;dbname=$db_database;charset=utf8",$db_user,$db_pw);
  } catch (PDOException $e) { // If an error is detected
    if (isset($debug))    // If we are going development
      die ('Unable to connect to database : ' . $e->getMessage());
    else          // Do NOT show above information to end users
      die ('Unable to connect to database, please try again later.');
  }
?>
