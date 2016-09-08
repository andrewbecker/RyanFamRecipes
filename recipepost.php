<?php 
	if(!empty($_POST['submit']) && ($_POST['submit'] == 'submit')){
		try {
			$connection = new MongoClient();
			$database = $connection->selectDB('ryanfam');
			$collection = $database->selectCollection('recipes');
			$recipe = array(
				'_id' 								=> new MongoId(),
				'cook_time'						=> $_POST['cook_time'],
				'course'							=> $_POST['course'],
				'creator' 						=> $_POST['creator'],
				'directions' 					=> $_POST['directions'],
				'ingredients' 				=> $_POST['ingredients'],
				'prep_time' 					=> $_POST['prep_time'],
				'saved_at' 						=> new MongoDate(),
				'short_description' 	=> $_POST['short_description'],
				'tags' 								=> explode(",",$_POST['tags']),
				'title' 							=> $_POST['title']
			);
			$collection->insert($recipe);
			header("Location: recipe.php?recipe=" . new MongoId($recipe["_id"]));
		} catch (MongoConnectException $e) {
			die("Failed to connect to database " . $e->getMessage());
		}
	} else {
		header("Location: recipes.php");
		die();
	}
?>


