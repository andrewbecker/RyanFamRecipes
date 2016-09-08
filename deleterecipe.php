<?php
	$id = $_GET['id'];
	require("includes/db_connection.php");
	$collection->remove(array('_id' => new MongoId($id)));

	header("Location: recipes.php");
	die();
?>
