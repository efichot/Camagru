<?php
	session_start();

	require_once(__DIR__ . '/config/database.php');
	require_once(__DIR__ . '/lib/routes.php');

	$rootURI = getRootURI();
	$requestData = getRequestData(getRequestURI($rootURI));
?>
<!DOCTYPE html>
<html>
	<?php
		require_once(__DIR__ . '/client/includes/head.php');
	 ?>
	<body class='body'>
		<?php
			require_once(__DIR__ . '/server/render.php');

			//Home
			getURI('/', renderHome);
			getURI('/index.php', renderHome);

			//Account forgot
			getURI('/forgot', renderForgot);

			//Success registred
			getURI('/success', renderSuccess);

			//app
			getURI('/app', renderApp);

			//gallery
			getURI('/gallery', renderGallery);

			//user
			getURI('/user', renderUser);

			// not registred
			getURI('/registred', renderRegistred);

			//single img
			if ($requestData[0] === 'single') {
				renderSingle(__DIR__ . '/client/views/single.php');
			}

			require_once(__DIR__ . '/lib/validateAccount.php');
			//validate account
			if ($requestData[0] === 'validate') {
				addRegistredUser($requestData[1], $requestData[2]);
			}
			//Change password
			if ($requestData[0] === 'changePassword') {
				changePassword($requestData[1], $requestData[2]);
			}

			//footer
			require_once(__DIR__ . '/client/includes/footer.php');
		?>
	</body>
</html>
