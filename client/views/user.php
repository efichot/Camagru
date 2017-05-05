<?php
	require_once(__DIR__ . '/../../lib/requireAuth.php');
	requireAuth();

	$page = 'user';

	require_once(__DIR__ . '/../../config/database.php');

	session_start();

	//retrieve img from the active user
	global $db;
	$stmt = $db->prepare('SELECT id FROM users WHERE login = ?');
	$stmt->bindParam(1, $_SESSION['login']);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$id = $result['id'];
	$stmt = $db->prepare('SELECT id, base_64 FROM img WHERE user_id = ? ORDER BY dates desc');
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$results = $stmt->fetchall(PDO::FETCH_ASSOC);

	require_once(__DIR__ . '/../includes/nav.php');

?>

<div class='gallery'>
  <?php if (isset($results)) {
		foreach ($results as $photo) { ?>
			<div class='gallery-single' id='<?php echo $photo['id'] ?>'>
				<a href='single/<?php echo $photo['id'] ?>'>
					<img src='<?php echo $photo['base_64'] ?>' alt='img-<?php echo $photo['id'] ?>'/>
				</a>
				<ul>
					<li id='trash'><i class="fa fa-5x fa-trash" aria-hidden="true"></i></li>
				</ul>
			</div>
<?php	}
	} ?>
</div>

<script type='text/javascript' src='./public/js/user.js'></script>
