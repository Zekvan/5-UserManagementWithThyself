<?php
//connection database
require_once "init.php";
// firstly, equal got id from list.php or search.php to variable 
//secondly,connection database then query customer which equal id then after  fetch customer 
$id = (int)$_GET['id'];
$customer = $connection->query("SELECT * FROM table1 WHERE id = $id")->fetch();
if(!$customer) header("Location: list.php");


if($_POST || isset($_FILES['photo'])){

	if (isUploadAnImage($_FILES['photo'])) {
		$uploadPath="photos";
		$extension=pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		$newName=uniqid().'.'.$extension;
		$destinationOfPhoto = $uploadPath.'/'.$newName;
		move_uploaded_file($_FILES['photo']['tmp_name'], $destinationOfPhoto);
	}
		//came information with post method this page 
		//equal data with post method to variable
	$name     = $_POST['name'];
	$surname  = $_POST['surname'];
	$email    = $_POST['email'];
	$phonenum = $_POST['phonenum'];
	$note     = $_POST['note'];
		// in here, prepare customer's informations for update
		//then execute update
	$updateQuery = $connection->prepare("UPDATE table1 SET name = ? , surname = ? , email = ? , phonenum = ? , note = ? , photo = ?  WHERE id = ? ");
	$isUpdated = $updateQuery->execute(array($name,$surname,$email,$phonenum,$note,$newName,$id));
	if($isUpdated){

		$image = new \Eventviva\ImageResize($destinationOfPhoto);
		$image
		   ->resizeToBestFit(125, 150)
		    ->save($uploadPath.'/thumbnails/'.$newName)

		    ->resizeToBestFit(375, 450)
		    ->save($uploadPath.'/popups/'.$newName)

		    ->resizeToBestFit(625, 750)
		    ->save($uploadPath.'/previews/'.$newName);

		header("Location: customer.php?id=".$id);
	}else{
		//if it didn't update informations , it make error message
		$_SESSION['message'] = "Didn't Update";
		header("Location: customer.php?id=".$id);
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
	
	<form  method="post" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Customer's name" value="<?=$customer['name']?>"><br>
		<input type="text" name="surname" placeholder="Customer's surname" value="<?=$customer['surname']?>"><br>
		<input type="email" name="email" placeholder="Customer's email" value="<?=$customer['email']?>"><br>
		<input type="text" name="phonenum" placeholder="Customer's phone number" value="<?=$customer['phonenum']?>"><br>
		<input type="textarea" name="note" placeholder="Note about customer" value="<?=$customer['note']?>"><br>
		<input type="file" name="photo" accept=".png, .jpg, .jpeg, image/png, image/jpg, image/jpeg" value="<?=$customer['photo']?>"><br>
		<br>
		<button type="submit">Update</button>
	</form>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>