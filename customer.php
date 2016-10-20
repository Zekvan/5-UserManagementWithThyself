<?php 
require_once "init.php";
// equal got id from list.php or search.php to variable
$id = (int)$_GET['id'];
//firstly, connect database
//secondly,query table in the database with id
//finally,fetch the table
$customer = $connection->query("SELECT * FROM table1 WHERE id = $id")->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>customer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<style>
		.photo img{
			width: 20%;
		}
	</style>
	
	
</head>
<body>
	<div class="container" >
		<? if(!is_null($message)): ?>
		<p><?=$message?></p>
		<? endif; ?>
	<h1><?=$customer['name']?> <?=$customer['surname']?></h1>

	
	<div class="photo">
		<a   class="fancybox" href="photos/previews/<?=$customer['photo']?>" >
		<img class="img-responsive img-thumbnail" src="photos/<?=$customer['photo']?>" alt="customerphoto" onmouseover="showtrail('photos/popups/<?=$customer['photo']?>');" onmouseout="hidetrail();">
		</a>
	</div>

	<p>Customer's email: <?=$customer['email']?></p>
	<p>Customer's Phone Number: <?=$customer['phonenum']?></p>
	<p>Note About Customer: <?=$customer['note']?></p>
	<hr>
	<!-- get id with get method then go to update.php with id-->
	<form action="update.php?id=<?=$customer['id']?>" method="get">
		<input type="hidden" name="id" value="<?=$customer['id']?>">
		<button type="submit">Update</button>
	</form>
	<br>
	<!--this time,get id with post method then go to delete.php with id 
	ask to us for use delete operation on this form -->
	<form method="post" action="delete.php" onsubmit="return confirm('This customer will deleted.Are you sure?')">
		<input type="hidden" name="idToDelete" value="<?=$customer['id']?>">
		<button type="submit">Delete</button>
	</form>
	<hr>
	<a href="list.php">Back to list</a>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
<script type="text/javascript" src="assets/js/tooltip.js"></script>
<script type="text/javascript" src="assets/js/ajax.js"></script>

</body>
</html>