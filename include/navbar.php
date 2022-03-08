<nav class="app__navbar">
	<div class="app__navbar-container">
		<a href="index.php" class="app__navbar-logo">
      		<h1>BLOGGER</h1>
    	</a>
    	<div class="app__navbar-nav">
    		<?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
    			<?php
		          require './auth/db_connection.php';
		          $username = $_SESSION['username'];
		          $get_user_data = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'");
		          $userData =  mysqli_fetch_assoc($get_user_data);
		        ?>

	    		<a href="new_article.php">New Article</a>
			  	<a href="settings.php">Settings</a>
			  	<a href="logout.php">Logout</a>
			  	<a class="icon">
			    	<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		        		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		      		</svg>
				</a>
			<?php endif; ?>
    	</div>
	</div>

	<!-- small screen nav -->
	<?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
		<?php
          require './auth/db_connection.php';
          $username = $_SESSION['username'];
          $get_user_data = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'");
          $userData =  mysqli_fetch_assoc($get_user_data);
        ?>
		<div class="app__navbar-small-screen">
			<a href="new_article.php">New Article</a>
			<a href="settings.php">Settings</a>
			<a href="logout.php">Logout</a>
		</div>
	<?php endif; ?>
	<script src="script/script.js"></script>
</nav>