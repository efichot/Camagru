<?php
	require_once(__DIR__ . '/../../lib/requireAuth.php');
	requireAuth();

	//retrieve id in the URL
	require_once(__DIR__ . '/../../lib/routes.php');
	$requestData = getRequestData(getRequestURI(getRoot()));
	$id = $requestData[1];

	require_once(__DIR__ . '/../../config/database.php');

	session_start();

	//retrieve img from the active user
	global $db;
	//all info about img
	$stmt = $db->prepare('SELECT * FROM img WHERE id = ?');
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$img = $stmt->fetch(PDO::FETCH_ASSOC);
	$user_id = $img['user_id'];
	//login who take the picture
	$stmt = $db->prepare('SELECT login FROM users WHERE id = ?');
	$stmt->bindParam(1, $user_id);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	//comments on the picture
	$stmt = $db->prepare('SELECT * FROM comments WHERE img_id = ?');
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$comment = $stmt->fetch(PDO::FETCH_ASSOC);

	require_once(__DIR__ . '/../includes/nav.php');

 ?>

<div class='gallery'>
	
</div>

 <script type='text/javascript' src='./public/js/single.js'></script>
