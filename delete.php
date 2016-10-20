<?php
// connection database
require_once "init.php";
if(isset($_POST['idToDelete'])){
	$idToDelete = (int)$_POST['idToDelete'];
	//if came post for delete 
	//equal data with post method to variable 
	// connection table on the  database with id which got and delete customer which equal id
	$deleteQuery = $connection->prepare("DELETE FROM table1 WHERE id = ?");
	$isDeleted = $deleteQuery->execute([$idToDelete]);
}
header("Location: list.php");