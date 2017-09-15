<?php
include('config.php');
?>
<?php session_start();
echo "Welcome ".$_SESSION['FIRSTNAME'] ; echo "&nbsp;"; echo $_SESSION['LASTNAME'] ;
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td{
	border: 1px solid black;
	border-collapse: collapse
}
#input{
	height:50px;
	width:500px;
}

.box_part {
    float: left;
    width: 48%;
    margin: 0 auto;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 10px;
    margin-right: 15px;
}
.bg-grey{background-color:#ececec;}
.bg-blue{background-color:#7eb7bd;}
.box_part ul{padding-left:0;}
.box_part ul li {
    background-color: aquamarine;
    margin-bottom: 10px;
    padding: 4px;
    font-size: 30px;
    font-family: sans-serif;
    list-style: none;
    width: 50%;
}

</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("a#getfriends").click(function() {  
// AJAX code to submit form.
$.ajax({
//type: "POST",
url: "all_friends.php",//insert.php--->wherever you want to fetch
//data: dataString,
//cache: false,
success: function(data) {
$("#loadata").html(data);
getfriends_ajax();
}
});

return false;
});
//////////////////////////////////////////////////
function getfriends_ajax() {
$('.show_friends').on('click',function() {  
            //alert("here");
            var id = $(this).attr("rel");
			//alert(id);
			var dataString = "id="+id;
			$.ajax({
			type: "post",
			url: "action_friends.php",
			data: dataString,
			success: function(result) {
			//alert(result);
			$("#loadata").html(result);
			
			}
			});
			});
}

//////////////////////////////////////////////////////////

	$("a#seefriends").click(function() {  
	// AJAX code to submit form.
		$.ajax({
			//type: "POST",
			url: "friend_req.php",//insert.php--->wherever you want to fetch
			//data: dataString,
			//cache: false,
			success: function(data1) {
			$("#loadreq").html(data1);
			inner_ajax();
			}
		});

	return false;
	});
	/////////////////////////////////////
	function inner_ajax() {
	
$('.request').on('click',function() {  
            //alert("here");
            var id = $(this).attr("rel");
			var status = $(this).attr("mel");
			var dataString = "idvalue="+id+"&status="+status;
			$.ajax({
			type: "post",
			url: "friend_accept.php",
			data:dataString,
				//data: {
				//idvalue: id,
				//status: status
				//	},
			//cache: false,
			success: function(result) {
			//alert(result);
			$("#loadreq").html(result);
			//$("#loadata").load("all_friends.php #table1");
			//$("#loadreq").html(data);
			}
			});
			});

	
	}

///////////////////////////////////////////
$("#myfriends").click(function() {  
	// AJAX code to submit form.
		$.ajax({
			//type: "POST",
			url: "my_friends.php",//insert.php--->wherever you want to fetch
			//data: dataString,
			//cache: false,
			success: function(data1) {
			$("#loadmyfriends").html(data1);
			inner_ajax2();
			}
		});

	return false;
	});
/////////////////////////////////////
	function inner_ajax2() {
$('.remove').on('click',function() {  
            alert("here");
            var id = $(this).attr("rel");
			var dataString1 = "idvalue="+id;
			//alert(dataString1);
			$.ajax({
			type: "post",
			url: "friends_remove.php",
			data:dataString1,
				//data: {
				//idvalue: id
				//	},
			//cache: false,
			success: function(result) {
			//alert(result);
			$("#loadmyfriends").html(result);
			}
			});
			});	}
			
			

			///////////////////////////////////////////
			
			 $("#post_button").submit(function() { 
			//e.preventDefault();
			var post_message = $("#post_message").val();
			var dataString = 'post_msg='+post_message;
			$.ajax({
			type: "post",
			url: "post_messages.php",
			data:dataString,
			success: function(result) {
			//alert(result);
			$("#loadmypost").html(result);
			}
			});
			});	 
///////////////////////////////////////			
			/* $("#post_button").click(function(){
			var post_msg = $("#post_message").val()+"</li>";
			//alert(post_msg)
			$("ul").prepend("<li>"+post_msg+"</li>");
			}); */
////////////////////////////////////////
$("#search_value").submit(function(e) { 
			e.preventDefault();
			var search_keyword = $("#search_keyword").val();
			//alert(search_keyword);
			var dataString = 'search_keyword='+search_keyword;
			$.ajax({
			type: "post",
			url: "search_page.php",
			data:dataString,
			success: function(result) {
			//alert(result);
			$("#load_search_results").html(result);
			inner_ajax2();
			getfriends_ajax();
			}
			});
		//	inner_ajax2();
			
			});

});
</script>
</head>
<body>
<div class="container">
<div class="box_part bg-blue">
<form id="post_button">
<input  id="post_message" "type="text" >

<input  id="" type="submit" value="POST" name="POST" >
</form>
<h2>My wall </h2> 
 <ul id="loadmypost"> 
 <?php
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
}
?>
</ul>
</div>
<div class="box_part bg-grey">
<h3><a href="login_page.php" style="margin-left:550px" >logout</a></h3>
<br><br>
<form id="search_value"> 
<input id="search_keyword" "type="text" >
<input type="submit" value="SEARCH" name="SEARCH" >
</form>
<ul id= "load_search_results" >
</ul>
<br><h1><a id="getfriends" href="#" >Send Friend request</a></h1>
<div id="loadata"> </div>
<br><h1><a id="seefriends" href="friend_req.php" >View friend requests </a></h1>
<div id="loadreq"></div>
<br><h1><a id="myfriends" href="#">My friends</a></h1>
<div id="loadmyfriends"></div>
</div>
</div>
</body>
</html>