<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<p><h1> Please enter email address and Password </h1></p>
<form action="action_login_page.php" method= "post">
Email:
<input type="text" name="email">
<br><br>
Password:
<input type="password" name="password" >

<br><br>

<input type="submit" value="submit">
</form>
</body>
</html>
