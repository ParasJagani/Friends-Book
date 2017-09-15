<?php
session_start();
?>
<?php
include('config.php');

?>
<?php 
$stmt = $dbh->prepare("SELECT * from reg_table WHERE email = '".$_POST["email"]."' and password = '".$_POST['password']."'");
$stmt->execute();
$result = $stmt->fetchAll();
$count = $stmt->rowCount();
if($count==1){
 foreach($result as $result) {
 $id     = $result["id"];	 
 $fname = $result["firstname"];
 $lname = $result["lastname"];
 $email = $result["email"];
 $password = $result["password"];
 }
$_SESSION['id']       =  $id; 
$_SESSION['FIRSTNAME'] = $fname;
$_SESSION['LASTNAME'] = $lname;
$_SESSION['EMAIL'] = $email;
   
header('location:profile.php');
}
else{
echo "LOGIN FAILED";
}
//print_r($result);


?>