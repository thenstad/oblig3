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
	<title>Your User ID: <?php print($userRow['user_id']); ?></title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
		 <a class="navbar-brand" href="profile.php">Profile</a>
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
			  </div>
			  <div class="container">
					<h1 class="h2">Give away an item</h1>
				  <?php echo 'Your User ID: ' . $_SESSION['user_session'];?>
			  <div class="form_container">
					<form action="functions/upload_item.php" method="post">
					  Title<br>
					  <input type="text" name="item_title"><br>
					  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"><br>
					  Description<br>
					  <textarea name="item_description" rows="5" cols="40"></textarea><br><br>
					  <input type="submit" value="Submit">
					</form>
				</div>

					<!-- IMPORTANT!!!! THIS FORM POSTS DATA TO UPLOAD_ITEM.PHP INSIDE THE FUNCTIONS FOLDER.
					WE GOTTA ADD THE ID OF THE USER TO THAT TABLE SO THAT THE TABLE INSIDE HOME.PHP ALSO SHOWS
					THE USER ID AND MAKE IT POSSIBLE TO CREATE A CHAT FROM THERE. -->
				</div>

		 </div>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
