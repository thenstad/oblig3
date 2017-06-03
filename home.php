<?php

	require_once("functions/session.php");

	require_once("functions/class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css"  />
	<title>Give away the things you don't need</title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
		  <div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
			 </button>
			 <a class="navbar-brand" href="home.php">GiveAway</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
			 <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					 <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
				  </ul>
				</li>
			 </ul>
		  </div><!--/.nav-collapse -->
		</div>
</nav>
<div class="clearfix"></div>

<div class="container-fluid" style="margin-top:80px;">
	 <div class="container">
		  <h1>
		  <a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a> &nbsp;
		  <a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></h1>
			 <hr />
		  <p class="h1">A list of all items</p>
	 </div>
	 <div class="container">

			 <?php
			 $username = "root";
			 $password = "";
			 $host = "127.0.0.1";

			 $connector = mysql_connect($host,$username,$password)
				  or die("Unable to connect");
			 $selected = mysql_select_db("dblogin", $connector)
				or die("Unable to connect");

			 //execute the SQL query and return records
			 $result = mysql_query("SELECT item_title, item_description, item_date, user_id FROM items ");
			 ?>
			 <table border="2" style= "background-color: white; margin: 0 auto; width: 40vw; height: 50vh auto; border: 1px solid grey;" >
			 <thead>
				<tr>
				  <th>Item</th> <!-- The name of the item filed in profile.php -->
				  <th>Description</th> <!-- The description filed in profile.php -->
				  <th>Date</th> <!-- The exact date the item was uploaded -->
				  <th>User ID</th> <!-- We tried to find some way to connect this user id to an unique chat -->
				  <th>CHAT</th> <!-- The possibility of chatting with product owner and anybody interested in the items -->
				</tr>
			 </thead>
			 <tbody>
				<?php

				//Fetches data from the items table in the dblogin database
				  while( $row = mysql_fetch_assoc( $result ) ){
					 echo
					 "<tr>
						<td>{$row['item_title']}</td>
						<td>{$row['item_description']}</td>
						<td>{$row['item_date']}</td>
						<td>{$row['user_id']}</td>
						<td><a href='chat/index.php'>CHAT</a></td>
					 </tr>\n";
				  }

				  //Shows your session ID, so you know who you are while chatting with other people, without
				  //giving away your username or email adress
				  echo 'Your User ID: ' . $_SESSION['user_session'];






				?>
			 </tbody>
		  </table>
			<?php mysql_close($connector); ?>

	</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
