<?php

?>
<!DOCTYPE html>
<html>
<body>
<?php
include('config.php');

?>



<?php 
  echo "hello"; echo "&nbsp;".$firstname = $_POST["firstname"];
   $lastname = $_POST["lastname"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   
  ?>
<?php 
   
  $stmt = $dbh->prepare("INSERT INTO reg_table(firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')");
$stmt->execute();
  ?>
  <a href="login_page.php"> Click here to login !<a>
  </body>
  </html>