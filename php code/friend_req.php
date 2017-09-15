<?php include('config.php'); ?>
<?php session_start(); ?>
<table style="border: 1px solid black;">
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
<tr/> 
<?php
//$stmt = $dbh->prepare("
//SELECT reg_table.firstname, reg_table.lastname , reg_table.id , reg_table.email , friends.sender_id , friends.reciver_id
//FROM reg_table
//LEFT JOIN friends
//N reg_table.id=friends.reciver_id
//GROUP BY email");
//$stmt1 = $dbh->prepare("SELECT flag FROM friends WHERE reciver_id = '".$_SESSION['id']."' ");
//$stmt1->execute();
//$result1 = $stmt1->fetchAll();
//print_r($result1);

$stmt = $dbh->prepare("SELECT * FROM reg_table WHERE id IN (SELECT sender_id FROM friends WHERE reciver_id = '".$_SESSION['id']."' and flag = '0')");
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) { ?>
<tr> <td> <?php echo $value['firstname'] ?> </td> <td> <?php echo $value['lastname'] ?> </td> 
<td> <?php echo $value['email'] ?> 
<td><a href="#" rel="<?php echo $value['id'];?>" mel="1" class="request">Accept</a></td>
<td><a href="#" rel="<?php echo $value['id'];?>" mel="0" class="request">Reject</a></td>
</tr>
<?php }  ?>
</table>
	