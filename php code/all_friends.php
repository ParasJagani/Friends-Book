<?php include('config.php'); ?>
<?php session_start();

?>
<table id="table1" style="border: 1px solid black;">
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
<tr/>
<?php
$current_id = $_SESSION['id'] ;
//echo $current_id ;
$stmt = $dbh->prepare("SELECT * from reg_table WHERE id != '$current_id'");
$stmt->execute();
$result = $stmt->fetchAll();
//$count = $stmt->rowCount();
//echo $count ;
foreach ($result as $value) { ?>
<tr> <td> <?php echo $value["firstname"] ?> </td>  <td> <?php echo $value["lastname"] ?> </td> 
<td> <?php echo $value["email"] ?> </td> 
<td> <a href="#" rel="<?php echo $value['id'];?>" class="show_friends"> SEND REQUEST </a> </td>
</tr>
<?php 
} 
?>
</table>
