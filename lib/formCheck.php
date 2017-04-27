<?php
	require_once(__DIR__ . '/../config/database.php');

	function checkLogin($login) {
		global $db;

		if ($login == '' || strlen($login) < 3 || strlen($login) > 32) {
			return false;
		}
		$stmt = $db->prepare('SELECT login FROM users');
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($results);
		foreach ($results as $result) {
			if ($result['login'] === $login) {
				return false;
			}
		}
		return true;
	}

	function checkPasswdMatches($pass, $confirmPass) {
		if ($pass !== $confirmPass || strlen($pass) < 4 || strlen($pass) > 50) {
			return false;
		}
		return true;
	}

	function checkMail($email) {
		global $db;

		if ($email = '' || !preg_match("/^[\w.-]+@[\w.-]+$/", $email)) {
			return false;
		}
		$stmt = $db->prepare('SELECT email FROM users');
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($results as $result) {
			if ($result['email'] === $email) {
				return false;
			}
		}
		return true;
	}
 ?>
