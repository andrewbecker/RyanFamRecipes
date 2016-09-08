<?php
include "includes/db_connection.php";
$test = str_replace(',', ' ', $_GET['arry']);
echo $test;


$searchTag = (isset($_GET['arry'])) ? 
		array('$text' => array('$search' => $test))
		: new stdClass();
$cursor = $collection->find($searchTag);
$totalRecipes = $cursor->count();
echo "<p>Total Recipes: " .$totalRecipes . "</p>";
?>