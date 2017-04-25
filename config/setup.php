<?php
	require_once(__DIR__ . '/database.php');

	$user = $db->query('CREATE TABLE IF NOT EXISTS user
		(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(255) NOT NULL,
		password VARCHAR(128),
		email VARCHAR(255) NOT NULL,
		registred BOOLEAN NOT NULL DEFAULT 0,
		is_admin BOOLEAN NOT NULL DEFAULT 0)'
	);

	$img = $db->query('CREATE TABLE IF NOT EXISTS img
		(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		base_64 MEDIUMTEXT CHARACTER SET ascii NOT NULL,
		author_id INT UNSIGNED NOT NULL,
		likes INT NOT NULL DEFAULT 0,
		dates TIMESTAMP NOT NULL DEFAULT now(),
		comments_nb INT NOT NULL DEFAULT 0)'
	);

	$comments = $db->query('CREATE TABLE IF NOT EXISTS comments_nb
		(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		img_id INT UNSIGNED NOT NULL,
		author_id INT UNSIGNED NOT NULL,
		author_email vARCHAR(255) NOT NULL,
		dates TIMESTAMP NOT NULL DEFAULT now(),
		content TEXT NOT NULL,
		avatar VARCHAR(255))'
	);
 ?>
