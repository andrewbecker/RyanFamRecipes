<?php
	$id = $_GET['recipe'];
	require("includes/db_connection.php");
	$recipe = $collection->findOne(array('_id' => new MongoId($id)));
	$ingredientList = explode(PHP_EOL, $recipe['ingredients']);
	$directionList = explode(PHP_EOL, $recipe['directions']);
	$tags = $collection->distinct("tags");
	foreach ($tags as $tag) {
		$num[$tag] = ($collection->find(array('$text' => array('$search' => $tag)))->count());
	}
	$courses = $collection->distinct("course");
	foreach ($courses as $course) {
		$sum[$course] = ($collection->find(array('$text' => array('$search' => $course)))->count());
	}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/head.php') ?>
	<title><?php echo $recipe['title']; ?> - Ryan Family Recipes</title>
</head>
<body>
	<div class="wrap">
		<?php include('includes/header.php') ?>
		<div class="lower">
			<div class="content">
				<h2><?php echo $recipe['title'];?></h2>
				<h3>Recipe by <?php echo $recipe['creator']?></h3>
				<p>Ingredients:</p>
				<ul>
					<?php foreach($ingredientList as $ing) : ?>
						<?php echo '<li>' . $ing . '</li>'; ?>
					<?php endforeach; ?>
				</ul>
				<p>Directions: </p>
				<ol type="1">
					<?php foreach($directionList as $direction) : ?>
						<?php echo '<li>' . $direction . '</li>'; ?>
					<?php endforeach; ?>
				</ol>
			</div>
			<?php include("includes/sidebar.php") ?>
			<?php include('includes/footer.php') ?>
</body>
</html>