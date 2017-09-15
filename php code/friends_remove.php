<?php include('config.php'); ?>
<?php session_start();
?>
 <?php
$id1 = $_POST['idvalue'];
//echo $id1 ;
$sql = "DELETE FROM friends WHERE sender_id = '$id1' AND reciver_id = '".$_SESSION['id']."'";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();
if($result)
{ echo "removed successful";}
else { echo "unsuccessful";}

?>