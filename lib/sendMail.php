<?php
	require_once __DIR__ . '/../config/database.php';
	require_once __DIR__ . '/routes.php';

	function sendSubscriptionMail($login, $email) {
		global $db;

		$rootURI = getRootURI();
		$query = 'SELECT password FROM users WHERE login = ?';
		$stmt = $db->prepare($query);
		$stmt->bindParam(1, $login);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		$validateURL = 'http://' . $_SERVER['HTTP_HOST'] . $rootURI . 'validate/' . $login . '/' . $result['password'];

		$subject = 'Camagru - Valider votre inscription';
		$message = '<html><head><title>Camagru - Valider votre inscription</title></head>
		<body>
			<h4>Bonjour, ' . $login . '.</h4>
			<p>Bienvenue sur Camagru ! Pour valider votre inscription, cliquez <a href="' . $validateURL . '" target="_blank">ici</a>.</p>
		</body></html>';
		$header = 'MIME-Version 1.0' . '\r\n';
		$header .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		$header .= 'To: ' . $login . ' <' . $email . '>' . '\r\n';
		$header .= 'From: Camagru app <noreply@camagru.app>' . '\r\n';

		mail($email, $subject, $message, $header);
	}

	function sendRecoverMail($login, $email) {
		global $db;

		$rootURI = getRootURI();
		$query = 'SELECT password FROM users WHERE login = ?';
		$stmt = $db->prepare($query);
		$stmt->bindParam(1, $login);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		$validateURL = 'http://' . $_SERVER['HTTP_HOST'] . $rootURI . 'change-password/' . $login . '/' . $result['password'];

		$subject = 'Camagru - Modifier votre mot de passe';
		$message = '<html><head><title>Camagru - Modifier votre mot de passe</title></head>
		<body>
			<h4>Bonjour, ' . $login . '.</h4>
			<p>Pour changer votre mot de passe, cliquez <a href="' . $validateURL . '" target="_blank">ici</a>.</p>
		</body></html>';
		$header = 'MIME-Version 1.0' . '\r\n';
		$header .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		$header .= 'To: ' . $login . ' <' . $email . '>' . '\r\n';
		$header .= 'From: Camagru app <noreply@camagru.app>' . '\r\n';

		mail($email, $subject, $message, $header);
	}
 ?>
