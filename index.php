<!DOCTYPE html>
<html>

	<?php include 'header.php';
	?>
		<div id="content" class="clearfix">
			<aside>
					<h2><?php echo date("l"); ?>'s Specials</h2>
					<hr>
					<?php include 'MenuItem.php';
					$stars="*";
					$i = 1;
					while ($i <= 6){
						if($i%2==1){
							$menuItems[] = new MenuItem("The WP Burger ".$stars.$i, "Freshly made all-beef patty served up with homefries", 14, "images/burger_small.jpg");
						} else {
							$menuItems[] = new MenuItem("WP Kebabs ".$stars.$i, "Tender cuts of beef and chicken, served with your choice of side", 17, "images/kebobs.jpg");
						}
					$stars = $stars . "*";
					$i++; 
					}
					$m = 0;
					while ($m <6){
						$photo = $menuItems[$m]->get_image();
						if($m%2==0){
							echo "<img src= $photo alt='Burger' title=\"Monday's Special - Burger\">";
						} else {
							echo "<img src= $photo alt='Kebobs' title='WP Kebobs'>";
						}
						$name = $menuItems[$m]->get_item_name();
						echo "<h3>$name;</h3>";
						$descript = $menuItems[$m]->get_description();
						$cost = $menuItems[$m]->get_price();
						echo "<p>$descript - $$cost</p>";
						echo "<hr>";
						$m++;
					}
					?>
				
			</aside>
			<div class="main">
				<h1>Welcome</h1>
				<img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				<h2>Book your Christmas Party!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
			</div><!-- End Main -->
		</div><!-- End Content -->
	<?php include 'footer.php'; ?>
    </body>
</html>
