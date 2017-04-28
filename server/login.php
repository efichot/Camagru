<?php
	require_once(__DIR__ . '/../config/database.php');
	require_once(__DIR__ . '/../lib/formCheck.php');

	session_start();

	if (isset($_POST['login']) && isset($_POST['password'])) {
		if (isUserExist($_POST['login'])) {
			if (passwdCheck($_POST['password'], $_POST['login'])) {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['is_connected'] = true;
				header('Location: /Camagru/app');
				die();
			}
		}
	}
	header('Location: /Camagru/');
?>
