<?php
	require_once(__DIR__ . '/../config/database.php');

	function retrieveEmail($login) {
		global $db;

		$stmt = $db->prepare('SELECT email FROM users WHERE login = ?');
		$stmt->bindParam(1, $login);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		$email = $user['email'];
		return $email;
	}

	function retrieveID($login) {
		global $db;

		$stmt = $db->prepare('SELECT id FROM users WHERE login = ?');
		$stmt->bindParam(1, $login);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		$id = $user['id'];
		return $id;
	}
 ?>
