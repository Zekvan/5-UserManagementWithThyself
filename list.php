<?php require_once "init.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
</head>
<body>
	<div class="container">
		<!--list customer with customer's id-->
		<!--came this page with customer's id -->
		<h2>Customer List</h2>
		<!-- we want all customer with foreach loop so we connection table in the database and use foreach loop  -->
		<ul>
			<?php foreach( $connection->query("SELECT * FROM table1") as $customer ): ?>
				<li>					
					<div class="photo">
						<a class="fancybox" href="photos/previews/<?=$customer['photo']?>">
						<img class="img-responsive img-thumbnail" src="photos/thumbnails/<?=$customer['photo']?>" alt="customerphoto" onmouseover="showtrail('photos/popups/<?=$customer['photo']?>');" onmouseout="hidetrail();"></a>	
							<a href="customer.php?id=<?=$customer['id']?>"><?=$customer['name']?> <?=$customer['surname']?></a>
							<hr>
						</div>
					</li> 
				<?php endforeach;?>
			</ul>
			<a href="index.php">Back to Home</a>
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
