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
			<form id="recipeinsert" action="recipepost.php" method="POST">
				<label for="title">Recipe name</label>
				<input type="text" name="title">

				<label for="creator">Creator</label>
				<input type="text" name="creator">

				<label for="short_description">Short Description</label>
				<textarea name="short_description" rows="10"></textarea>
				
				<label for="ingredients">Ingredients</label>
				<textarea name="ingredients" rows="10"></textarea>

				<label for="directions">Directions</label>
				<textarea name="directions" rows="10"></textarea>

				<label for="prep_time">Prep Time</label>
				<input type="text" name="prep_time">

				<label for="cook_time">Cook Time</label>
				<input type="text" name="cook_time">

				<label for="tags">Tags</label>
				<textarea name="tags" rows="3"></textarea>
					
				<label for="course">Course</label>
				<input type="text" name="course">

				<input type="submit" name="preview" value="preview">
				<input type="submit" name="submit" value="submit">
			</form>
		</div>
		<script src="http://localhost:35729/livereload.js"></script>
	</body>
</html>