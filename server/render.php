<?php
	require_once(__DIR__ . '/../lib/renderTemplate.php');

	//render login home
	function renderHome() {
		renderTemplate(__DIR__ . '/../client/views/home.php');
	}

 ?>
