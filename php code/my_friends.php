<?php include('config.php'); ?>
<?php session_start(); ?>
<table style="border: 1px solid black;">
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
<tr/> 
<?php
//$stmt1 = $dbh->prepare("SELECT sender_id  FROM friends WHERE reciver_id = '".$_SESSION['id']."' and flag = '1'");
//$stmt1->execute();
//$result1 = $stmt1->fetchAll();

////////////////////
$stmt = $dbh->prepare("SELECT * FROM reg_table WHERE id IN (SELECT sender_id  FROM friends WHERE reciver_id = '".$_SESSION['id']."' and flag = '1') OR id IN(SELECT reciver_id  FROM friends WHERE sender_id = '".$_SESSION['id']."' and flag = '1') ");//this shows in reciver's friend list.
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $value) { ?>
<tr> <td> <?php echo $value['firstname'] ?> </td> <td> <?php echo $value['lastname'] ?> </td> 
<td> <?php echo $value['email'] ?> 
<td><a href="#" rel="<?php echo $value['id'];?>" class="remove">Remove</a></td>
</tr>
<?php }  ?>
</table>