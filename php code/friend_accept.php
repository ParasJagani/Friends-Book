<?php include('config.php'); ?>
<?php session_start();
?>
 <?php
$id1 = $_POST['idvalue'];
$status = $_POST['status'];

if($status==1)
{
	
	$sql = "UPDATE friends SET flag ='1' WHERE sender_id = '$id1' AND reciver_id = '".$_SESSION['id']."' ";
	$stmt = $dbh->prepare($sql);
	$result = $stmt->execute();
	if($result)
	{ echo "successful";}
	else { echo "unsuccessful";}
}
else
{
	$sql = "DELETE FROM friends WHERE sender_id = '$id1' AND reciver_id = '".$_SESSION['id']."'";
	$stmt = $dbh->prepare($sql);
	$result = $stmt->execute();
	if($result)
	{ echo "sent successful";}
	else { echo "unsuccessful";}
}
?>


	