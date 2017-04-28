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
	<body>
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


			//footer
			require_once(__DIR__ . '/client/includes/footer.php');
			//script
			require_once(__DIR__ . '/client/includes/script.php');
		?>
	</body>
</html>
