<?php
	require_once(__DIR__ . '/../lib/renderTemplate.php');

	//render login home
	function renderHome() {
		renderTemplate(__DIR__ . '/../client/views/home.php');
	}

	function renderForgot() {
		renderTemplate(__DIR__ . '/../client/views/forgot.php');
	}

	function renderSuccess() {
		renderTemplate(__DIR__ . '/../client/views/success.php');
	}

 ?>
