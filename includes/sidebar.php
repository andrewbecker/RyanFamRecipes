<div class="sidebar">
	<div class="courses">
		<h2 class="courses">Courses <img class="courses" height="20px" width="20px" src="_/components/images/up-arrow-icon.png" alt="arrow" /></h2>
		<ul class="courses">
			<form id="courses" action="" method="GET">
			<?php foreach($courses as $course) : ?>
				<li>
					<input type="checkbox" class="checkbox" id="<?php echo $course; ?>" value="<?php echo $course?>" onclick="document.getElementById('hiddenval').submit();" <?php if(isset($_GET['q']) && strpos($_GET['q'], $course) !== false){echo "checked";}?> ><?php echo $course . "<span class='count'> (" . $sum[$course] . ")</span>"?> 
				</li>
			<?php endforeach; ?>
			</form>
			<form id="hiddenval" action="searchresults.php" method="GET">
				<input type="hidden" id="hide" name="q">
			</form>
		</ul>
	</div>
	
</div> <!-- sidebar -->


