<?php
	define("DATABASE", "ryanfam");
	define("COLLECTION", "recipes");

	try {
		$connection = new MongoClient();
		$database = $connection->selectDB(DATABASE);
		$collection = $database->selectCollection(COLLECTION);
	} catch (MongoConnectException $e) {
		die("Failed to connect to database " . $e->getMessage());
	}
?>