<?php
  session_start();
  require_once('dbconfig.php');

  if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if username exists and password is correct
    try {
      $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute(array(':email' => $email));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row['password'] == $password) {
        echo "log in successsss";
        $_SESSION['user_session'] = $row['id'];
      } else {
        echo "Brukernavn eller passord er ugyldig";
      }

    }
    catch(PDOException $e){
    echo $e->getMessage();
  }
?>
