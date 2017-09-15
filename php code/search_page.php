

<?php include('config.php'); ?>
<?php session_start(); ?>
<?php $search_value = $_POST['search_keyword'];
//echo $search_value ;
$stmt = $dbh->prepare("SELECT firstname,id,lastname FROM reg_table WHERE (firstname = '$search_value' or lastname ='$search_value')
AND 
(id IN (SELECT sender_id  FROM friends WHERE reciver_id = '".$_SESSION['id']."' and flag = '1') 
OR 
id IN(SELECT reciver_id  FROM friends WHERE sender_id = '".$_SESSION['id']."' and flag = '1'))
");

$stmt->execute();
$result = $stmt->fetchAll();
$current_id = $_SESSION["id"];

if($result)
{ ?> 
<h3><?php Echo "SEARCH RESULTS" ?> </h3><?php
foreach ($result as $value) {  ?>
<li> <?php echo $value["firstname"]; echo "&nbsp;"; echo $value["lastname"]; echo "&nbsp"?> <a href="#" rel="<?php echo $value['id'];?>" class="remove" >Remove</a> </li> 

 <?php
 }
}
else{
$stmt2 = $dbh->prepare("SELECT firstname,lastname,id from reg_table WHERE firstname = '$search_value' AND id!='$current_id'");
$stmt2->execute();
$result2 = $stmt2->fetchAll();
 ?>
<h3><?php Echo "SEARCH RESULTS" ?> </h3><?php
if($result2)
{ 
foreach ($result2 as $value) { ?> 
<li> <?php echo $value["firstname"]; echo "&nbsp;"; echo $value["lastname"]; echo "&nbsp"?><a href = "#" rel="<?php echo $value['id'];?>" class="show_friends">Add Friend</a> </li>
 <?php
}}
else  {
	
	echo "no user found ";
}

	
}
?>	


 