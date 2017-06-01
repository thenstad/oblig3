<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dblogin";




//Perform database query
$item_title = $_POST['item_title'];
$item_description = $_POST['item_description'];


//INSERTS THE WANTED ITEM TO THE TABLE IN HOME.PHP
try {
	 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	 // set the PDO error mode to exception
	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $sql = "INSERT INTO items (item_title, item_description)
	 VALUES ('".$_POST["item_title"]."', '".$_POST["item_description"]."')";
	 // use exec() because no results are returned
	 $conn->exec($sql);
 }
catch(PDOException $e)
	 {
	 echo $sql . "<br>" . $e->getMessage();
	 }

// RETURN TO THE SAME PAGE AFTER CLICKING SUBMIT IN PROFILE.PHP
header("Location: ../profile.php");

//END CONNECTION
$conn = null;
?>
