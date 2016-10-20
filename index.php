<?php 
require_once "init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proje4</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
</head>
<body>
	<div class="container">
		<? if(!is_null($message)): ?>
		<p><?=$message?></p>
	<? endif; ?>
	<!--İnformation about customer post creat.php-->
	<form action="creat.php" method="post" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="surname" placeholder="Surname"><br>
		<input type="email" name="email" placeholder="E-mail"><br>
		<input type="number" name="phonenum" placeholder="Phone Number"><br>
		<input type ="textarea" name="note" placeholder="Note"><br>
		<select name="role">
			<option value="friend" >Friend</option>
			<option value="relative">Relative</option>
			<option value="workmate">Workmate</option>
		</select><br>
		<input type="file" name="photo" accept=".png, .jpg, .jpeg, image/png, image/jpg, image/jpeg"><br>
		<input type="submit" name="add" value="Add"><br>
	</form>	

	<!--inputed key post search.php -->
	<form action="search.php" method="post" name="search">
		<input type="text"  name="search" placeholder="Customer's Name,Surname...">
		<input type="submit" value="search">
	</form>

	<a href="list.php">Customer List</a> <br>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="/assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
</body>
</html>