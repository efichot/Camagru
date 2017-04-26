<?php
	session_start();

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
			getURI('/', renderHome);
			getURI('/index.php', renderHome);







			//footer
			require_once(__DIR__ . '/client/includes/footer.php');
		?>
	</body>
</html>
