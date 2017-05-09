<?php
	require_once(__DIR__ . '/../../lib/routes.php');
	
	session_start();
 ?>

<nav>
	<ul class='inline-block'>
		<li class='logo text-left'><h1>C<span class='bold gray'>A</span>M<span class='bold gray'>A</span>G<span class='bold gray'>R</span>U</h1></li>
		<li id='shoot' class='menu text-right <?php echo ($page === 'app') ? 'active' : '';?>'><a href="<?php echo getRootURI(); ?>app">Take Picture</a></li>
		<li id='gallery' class='menu text-right <?php echo ($page === 'gallery') ? 'active' : '';?>'><a href="<?php echo getRootURI(); ?>gallery">Gallery</a></li>
		<li id='user' class='menu text-right <?php echo ($page === 'user') ? 'active' : '';?>'><a href="<?php echo getRootURI(); ?>user"><?php echo $_SESSION['login']; ?></a></li>
		<li id='logout' class='menu text-right'><button id='btn-logout'><a id='logout' href="<?php echo getRootURI(); ?>server/logout.php">Logout</a></button></li>
	</ul>
</nav>
