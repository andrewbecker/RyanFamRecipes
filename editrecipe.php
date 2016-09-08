<?php 
	require("includes/db_connection.php");

	if(!empty($_POST['submit']) && ($_POST['submit'] == 'submit')){
		$recipe=array(
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
		$id = $_POST['id'];
		$collection->update(array('_id' => new MongoId($id)),$recipe);
		header("Location: recipe.php?recipe=" . new MongoId($id));
		
	} else {
		$id = $_GET['id'];
		$recipe = $collection->findOne(array('_id' => new MongoId($id)));
		$tags = implode(",", $recipe['tags']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<meta charset="utf-8"/>
		<title>Test recipe form</title>
		<link rel="stylesheet" type="text/css" href="_/css/styles.css">
		<script type="text/javascript" src="_/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="_/js/sidebar.js"></script>
	</head>
	<body>
		<div class="wrap">
			<h1>This is a test form</h1>
			<form action="editrecipe.php" method="POST">
				<label for="title">Recipe name</label>
				<input type="text" name="title" value="<?php echo $recipe['title']; ?>">

				<label for="creator">Creator</label>
				<input type="text" name="creator" value="<?php echo $recipe['creator']; ?>">

				<label for="short_description">Short Description</label>
				<textarea name="short_description" rows="10"><?php echo $recipe['short_description']; ?></textarea>
				
				<label for="ingredients">Ingredients</label>
				<textarea name="ingredients" rows="10" ><?php echo $recipe['ingredients']; ?></textarea>

				<label for="directions">Directions</label>
				<textarea name="directions" rows="10" ><?php echo $recipe['directions']; ?></textarea>

				<label for="prep_time">Prep Time</label>
				<input type="text" name="prep_time" value="<?php echo $recipe['prep_time']; ?>">

				<label for="cook_time">Cook Time</label>
				<input type="text" name="cook_time" value="<?php echo $recipe['cook_time']; ?>">

				<label for="tags">Tags</label>
				<textarea name="tags" rows="3"><?php echo $tags ?></textarea>

				<label for="course">Course</label>
				<input type="text" name="course" value="<?php echo $recipe['course']; ?>">

				<input type="hidden" name="id" value="<?php echo $recipe['_id']; ?>">
				
				<input type="submit" name="preview" value="preview">
				<input type="submit" name="submit" value="submit">
			</form>
		</div>
		<script src="http://localhost:35729/livereload.js"></script>
	</body>
</html>