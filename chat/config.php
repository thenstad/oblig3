<?php
if(!isset($dbh)){
session_start();
 date_default_timezone_set("UTC"); // Time Zone
 $host = "127.0.0.1"; // Hostname
 $port = "3306"; // MySQL Port : Default : 3306
 $user = "root"; // Username
 $pass = ""; //Password
 $db   = "dblogin"; // Database
 $dbh  = new PDO('mysql:dbname='.$db.';host='.$host.';port='.$port,$user,$pass);

 /*Change The Credentials to connect to database.*/
 include("user_online.php");
}
?>
