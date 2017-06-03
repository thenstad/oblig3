<?php
if(isset($_POST['name']) && !isset($display_case)){
 $name=htmlspecialchars($_POST['name']);
 $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sql->execute(array($name));
 if($sql->rowCount()!=0){
  $ermsg="<h2 class='error'>Name Taken. <a href='index.php'>Try another Name.</a></h2>";
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($name));
  $_SESSION['user']=$name;
 }
}elseif(isset($display_case)){
 if(!isset($ermsg)){
?>
 <h2>User ID needed for chatting</h2>
 Your ID will be visible to other users<br/><br/>
 <form action="index.php" method="POST">
  <div>User ID : <input name="name" placeholder="User ID"/></div>
  <button>Start chat</button>
 </form>
<?php
 }else{
  echo $ermsg;
 }
}
?>
