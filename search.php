<?php 
//connection database
require_once "init.php";
//control that is post empty? 
if(!empty($_POST["search"])) {
	$key = $_POST["search"];
	//equal data with post method to variable 
	//key variable search database
	$search=$connection->prepare(" SELECT * FROM  table1 WHERE name LIKE ? OR surname LIKE ? OR email LIKE ? OR phonenum LIKE ? OR note LIKE ?");
	$search->execute(array('%'.$key.'%','%'.$key.'%','%'.$key.'%','%'.$key.'%','%'.$key.'%'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<style>
		 img{
			width: %;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="post" name="search">
			<input type="text"  name="search" placeholder="Customer's Name,Surname...">
			<input type="submit" value="search"> 
		</form><br>
		<!--if search is emtyp ,then we want least one letter from user-->
		<?php if (empty($key)) echo "Please,enter least one letter to search<hr>"; 
		else{  
			foreach ($search as $data): ?>
				<!--if search isn't empty,display customers or customer -->
				<form>
					<a class="fancybox" href="photos/previews/<?=$data['photo']?>">
						<img class="img-responsive img-thumbnail" alt="customerphoto" src="photos/thumbnails/<?=$data['photo']?>" onmouseover="showtrail('photos/popups/<?=$data['photo']?>');" onmouseout="hidetrail();" ></a>

						<h2><a href="customer.php?id=<?=$data['id']?>"><?=$data['name']?> <?=$data['surname']?></a></h2>
						Customer's email: <?=$data['email']?><br>
						Customer's Phone Number: <?=$data['phonenum']?><br>
						Note About Customer: <?=$data['note']?><br>
					</form>
					<hr>	
			<?php endforeach; ?>
			<?php } ?>

			<a href="index.php">Back to home</a>
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