<?php
include('config.php');
?>
<?php session_start();

?>

<?php
$sender_id = $_SESSION['id'];
$reciver_id = $_POST['id'];
$stmt = $dbh->prepare("SELECT * from friends WHERE sender_id = '".$_SESSION['id']."' and reciver_id = '".$reciver_id."'");
$stmt->execute();
$result = $stmt->fetchAll();
$count = $stmt->rowCount();
//echo $count ;
if($count==0){

$stmt = $dbh->prepare("INSERT INTO friends (sender_id, reciver_id,flag) VALUES('$sender_id','$reciver_id','0')");
$stmt->execute();
echo "thanks"; echo "&nbsp;".$_SESSION['FIRSTNAME'] ; echo "&nbsp;"; echo $_SESSION['LASTNAME'] ; echo "&nbsp;"."request send successfully" ;
}
else{
	echo "Already send";

}
?>