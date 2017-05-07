<?php
	require_once(__DIR__ . '/../../lib/requireAuth.php');
	requireAuth();

	$page = 'gallery';

	require_once(__DIR__ . '/../../config/database.php');
	require_once(__DIR__ . '/../../lib/imageLib.php');

	//retrieve img
	global $db;
	$stmt = $db->prepare('SELECT id, base_64, likes, comments_nb FROM img ORDER BY dates desc');
	$stmt->execute();
	$results = $stmt->fetchall(PDO::FETCH_ASSOC);

	require_once(__DIR__ . '/../includes/nav.php');

 ?>

 <div class='gallery'>
	 <?php
	 	if (isset($results)) {
			foreach ($results as $photo) { ?>
				<div class='gallery-single' id='<?php echo $photo['id'] ?>'>
					<a href='single/<?php echo $photo['id'] ?>'>
						<img class='<?php echo filter($photo['id']); ?>' src='<?php echo $photo['base_64'] ?>' alt='img-<?php echo $photo['id'] ?>'/>
					</a>
					<ul>
				  <?php if ($photo['likes'] == 0) { ?>
							<li class='likes-nb'><i class="fa fa-4x fa-heart-o" aria-hidden="true"></i><?php echo $photo['likes'] ?></li>
				  <?php } else { ?>
							<li class='likes-nb'><i class="fa fa-4x fa-heart" aria-hidden="true"></i><?php echo $photo['likes'] ?></li>
				  <?php } ?>
				  <?php if ($photo['comments_nb'] == 0) { ?>
							<li class='likes-nb'><i class="fa fa-4x fa-comment-o" aria-hidden="true"></i><?php echo $photo['comments_nb'] ?></li>
				  <?php } else { ?>
							<li class='likes-nb'><i class="fa fa-4x fa-comment" aria-hidden="true"></i><?php echo $photo['comments_nb'] ?></li>
				  <?php } ?>
					</ul>
				</div>
	<?php	}
		} ?>
 </div>

 <script type='text/javascript' src='./public/js/gallery.js'></script>
