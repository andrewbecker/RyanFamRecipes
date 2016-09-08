<?php
	if(!isset($_GET['q']) || $_GET['q']===""){
		header("Location: recipes.php");
		die();
	}
	$searchTag = (isset($_GET['q'])) ? 
		array('$text' => array('$search' => $_GET['q']))
		: new stdClass();
	require("includes/db_connection.php");
	$tags = $collection->distinct("tags");
	foreach ($tags as $tag) {
		$num[$tag] = ($collection->find(array('$text' => array('$search' => $tag)))->count());
	}
	$courses = $collection->distinct("course");
	foreach ($courses as $course) {
		$sum[$course] = ($collection->find(array('$text' => array('$search' => $course)))->count());
	}
	$bread = explode(",", $_GET['q']);

	//Pagination
	$currentPage = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	$recipesPerPage = 5;
	$skip = ($currentPage - 1) * $recipesPerPage;
	$cursor = $collection->find($searchTag);
	$totalRecipes = $cursor->count();
	echo "<p>Total Recipes: " .$totalRecipes . "</p>";
	$totalPages = (int) ceil($totalRecipes / $recipesPerPage);
	$cursor->sort(array('title'=>1))->skip($skip)->limit($recipesPerPage);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('includes/head.php') ?>
	<title>Ryan Family Recipes</title>
</head>
<body>
	<div class="wrap">
	<?php include('includes/header.php') ?>
	<div class="lower">
		<div class="content">
			<div id="breadcrumb">
				<ul>
					<p>Filters:</p>
					<?php foreach($bread as $item): ?>
					<li data-filter="<?php echo $item ?>"><?php echo $item ?><img src="_/components/images/x.png" alt="remove filter" height="15px" width="15px"></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php while ($cursor->hasNext()) : $recipe = $cursor->GetNext(); ?>
				<div class="recipe">
				<div id="picture">
					<img src="_/components/images/apple.jpg" alt="apple" height="75px" width="75px">
				</div>
					<h2><a href="recipe.php?recipe=<?php echo $recipe['_id'] ?>" ><?php echo $recipe['title']; ?></a> </h2>
					<p>
						By: <?php echo ($recipe['creator']); ?><br />
						<a href="editrecipe.php?id=<?php echo $recipe['_id'] ?>">Edit</a>
						<a href="deleterecipe.php?id=<?php echo $recipe['_id'] ?>">Delete</a>
					</p>
					<br />
					<div class="horizline"></div>
				</div>
				<br />
			<?php endwhile ?>
			<div id="navigation">
				<div class="prev">
					<?php if($currentPage !== 1 && $totalPages !== 0) : ?>
						<a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . ($currentPage -1) . '&q=' . $_GET['q'];?>">Previous</a>
					<?php endif ?>
				</div>
				<div class="page-number">
					<?php if($totalPages !== 0) { echo $currentPage; } ?>
				</div>
				<div class="next">
					<?php if($currentPage !== $totalPages && $totalPages !== 0) : ?>
						<a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage + 1) . '&q=' . $_GET['q'];?>">Next</a>
					<?php endif; ?>
				</div>
			</div>
		</div> <!-- content -->

		<?php include('includes/sidebar.php') ?>
		<?php include('includes/footer.php') ?>
</body>
</html>