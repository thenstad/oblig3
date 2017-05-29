<?php
  session_start();

  //if !isset session->user_session

  include_once('dbconfig.php');

  if (isset($_SESSION['user_session'])) {
    $userId = $_SESSION['user_session'];
    $stmt = $db->prepare("SELECT firstname FROM users WHERE id = :uid");
    $stmt->execute(array(':uid' => $userId));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Oblig 3</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Material Icons font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">GiveAway</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Mine annonser</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link2</a>
          </li>
        </ul>
        <form class="form-inline" id="login_form" method="post">
          <input type="email" class="form-control form-control-sm mr-sm-2" placeholder="E-mail" name="email" aria-describedby="user-addon">
          <input type="password" class="form-control form-control-sm mr-sm-2" placeholder="Passord" name="password">

          <button type="submit" class="btn btn-primary btn-sm mr-sm-2" name="login">Logg inn</button>
          <button type="button" class="btn btn-secondary btn-sm">Lag ny bruker</button>
        </form>
      </div>
    </nav>
    <?php if (isset($_SESSION['user_session'])) {
        // User is logged in
        ?>
          <h1><?php echo $row['firstname']; ?></h1>
        <?php
        //include_once('layouts/test.php');
      }
    ?>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Tether JS (Required for certain bootstrap functions) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="js/script.js"</script>
  </body>
</html>
