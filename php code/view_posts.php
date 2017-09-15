<?php include('config.php'); ?>
<?php session_start();
?>
<?php
$stmt12 = $dbh->prepare("SELECT reg_table.firstname, reg_table.lastname ,post_messages.post_message
FROM reg_table
RIGHT JOIN post_messages
ON reg_table.id = post_messages.message_sender 
ORDER BY post_messages.id DESC");
$stmt12->execute();
$result12 = $stmt12->fetchAll();
foreach ($result12 as $value) { ?>
<li><?php echo $value["firstname"]; echo "&nbsp;"; echo $value['lastname'].":" ; ?> <br>
<?php echo $value["post_message"] ?> </li>
<?php
}
?>
