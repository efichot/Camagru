<?php
	session_start();
 ?>

<nav>
	<ul class='inline-block'>
		<li class='logo text-left'><h1>C<span class='bold gray'>A</span>M<span class='bold gray'>A</span>G<span class='bold gray'>R</span>U</h1></li>
		<li id='shoot' class='menu text-right' "<?php echo ($page === 'app') ? 'active' : '';?>"><a href="/Camagru/app">Take Picture</a></li>
		<li id='gallery' class='menu text-right' "<?php echo ($page === 'gallery') ? 'active' : '';?>"><a href="/Camagru/gallery">Gallery</a></li>
		<li id='user' class='menu text-right' "<?php echo ($page === 'user') ? 'active' : '';?>"><a href="/Camagru/user"><?php echo $_SESSION['login']; ?></a></li>
		<li id='logout' class='menu text-right'><button id='logout'><a href="/Camagru/server/logout.php">Logout</a></button></li>
	</ul>
</nav>
