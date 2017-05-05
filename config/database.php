<?php
	// yasser.an@6.emailfake.ml
	// Server: sql11.freemysqlhosting.net
	// Name: sql11172924
	// Username: sql11172924
	// Password: 8VZdd43tFI

	$DB_DSN = 'mysql:host=sql11.freemysqlhosting.net;dbname=sql11172924;charset=utf8';
	$DB_USER = 'sql11172924';
	$DB_PASSWORD = '8VZdd43tFI';

	try {
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo 'Error connecting to the Database: ' . $e->getMessage();
		exit;
	}
 ?>
