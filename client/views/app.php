<?php
	session_start();
	require_once(__DIR__ . '/../../lib/requireAuth.php');
	requireAuth();

	$page = 'app';

	require_once(__DIR__ . '/../includes/nav.php');

 ?>

<div class='main app'>
	<div class='top-app'>
		<div id='top-left-app' class='webcam'>
			<img id='Troll' src='./public/img/troll.png' />
			<img id='nyancat' src='./public/img/nyancat.png' />
			<!-- if camera available -->
			<video id='camera' width="100%" autoplay></video>
			<!-- else -->
			<img class='hidden' id='top-left-img' src='' alt='top-left-img' />
		</div>
		<div id='top-right-app' class='preview'>
			<!-- hidden -->
			<canvas class='hidden' id='canvas' width='' height=''></canvas>
			<!-- else if uploaded image -->
			<img class='hidden' id='return-img' src='' alt='return-img' />
		</div>
	</div>
	<div class='bottom-app'>
		<div id='bottom-left-app' class='tabs'>
			<ul id='tab-header'>
				<li id='tab-obj'>Objects</li>
				<li id='tab-filters'>Filters</li>
				<li id='tab-upload' class='hidden'>Image Upload</li>
			</ul>
			<div id='objects'>

			</div>
			<div id='filters'>

			</div>
			<div id='no-camera'>
				<input type='file' name='fileToUpload' id='fileToUpload' />
			</div>
			<button type='button' class='btn disabled' id='snap'>Take snapshot</button>
		</div>
		<div id='bottom-right-app' class='last-taken'>
			<?php
				
			 ?>
		</div>
	</div>
</div>
<script type='text/javascript' src='./public/js/app.js'></script>
