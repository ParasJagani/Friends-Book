<?php include('config.php'); ?>
<?php session_start(); ?>
<?php
$message_sender = $_SESSION["id"];
$post_msg = $_POST["post_msg"];
$stmt = $dbh->prepare("INSERT INTO post_messages(post_message, message_sender) VALUES ('$post_msg','$message_sender')");
$result = $stmt->execute(); 
if($result){ 
$stmt12 = $dbh->prepare("
SELECT reg_table.firstname, reg_table.lastname ,post_messages.post_message
FROM reg_table
RIGHT JOIN post_messages
ON reg_table.id = post_messages.message_sender
WHERE
post_messages.message_sender ='".$_SESSION['id']."' OR post_messages.message_sender 
IN
( SELECT sender_id from friends WHERE reciver_id = '".$_SESSION['id']."' AND flag ='1')
OR post_messages.message_sender
IN
(SELECT reciver_id from friends WHERE sender_id = '".$_SESSION['id']."' AND flag ='1')
ORDER BY post_messages.id DESC"
);
$stmt12->execute();
$result12 = $stmt12->fetchAll();
foreach ($result12 as $value) { ?>
<li><?php echo $value["firstname"]; echo "&nbsp;"; echo $value['lastname'].":" ; ?> <br>
<?php echo $value["post_message"] ?> </li>
<?php
 } }
?>
 








