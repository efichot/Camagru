<?php
	session_start();
	require_once(__DIR__ . '/../../lib/requireAuth.php');
	requireAuth();

	$page = 'app';

	require_once(__DIR__ . '/../../config/database.php');

	//retrieve 4 last pics
	global $db;
	$stmt = $db->prepare('SELECT id, base_64 FROM img ORDER BY dates desc LIMIT 4');
	$stmt->execute();
	$results = $stmt->fetchall(PDO::FETCH_ASSOC);

	require_once(__DIR__ . '/../includes/nav.php');

 ?>

<div class='main app'>
	<div class='top-app'>
		<div id='top-left-app' class='webcam'>
			<!-- if camera available -->
			<video id='camera' width="100%" autoplay></video>
			<!-- else -->
			<img class='hidden' id='top-left-img' src='' alt='top-left-img' />
		</div>
		<button type='button' class='btn disabled' id='snap'>Take snapshot</button>
		<div id='top-right-app' class='preview'>
			<!-- hidden -->
			<canvas class='hidden' id='canvas' width='' height=''></canvas>
			<!-- else if uploaded image -->
			<img class='hidden' id='return-img' src='' alt='return-img' />
		</div>
	</div>
	<div class='bottom-app'>
		<div id='bottom-left-app' class='tabs'>
			<ul id='tab-header'>
				<li id='tab-obj'>
					Objects
					<div id='objects'>
						<ul class='objects'>
							<li><img id='Troll' src='./public/img/troll.png' /></li>
							<li><img id='nyancat' src='./public/img/nyancat.png' /></li>
							<li><img id='4chan' src='./public/img/4chan.png' /></li>
							<li><img id='Forever-Alone' src='./public/img/Forever-Alone.png' /></li>
							<li><img id='grumpy' src='./public/img/grumpy.png' /></li>
							<li><img id='My-Little-Pony' src='./public/img/My-Little-Pony.png' /></li>
							<li><img id='palmier' src='./public/img/palmier.png' /></li>
							<li><img id='smiley' src='./public/img/smiley.png' /></li>
							<li><img id='Thug-life' src='./public/img/Thug-life.png' /></li>
							<li><img id="bob-l'eponge" src="./public/img/bob-l'eponge.png" /></li>
							<li><img id='grenouille' src='./public/img/grenouille.png' /></li>
							<li><img id='Pedobear' src='./public/img/Pedobear.png' /></li>
						</ul>
					</div>
				</li>
				<li id='tab-filters'>
					Filters
					<div id='filters'>
						<button class="" id="Normal" type="button" name="Normal">Normal</button>
						<button class="_1977" id="1977" type="button" name="1977">1977</button>
						<button class="aden" id="Aden" type="button" name="Aden">Aden</button>
						<button class="brooklyn" id="Brooklyn" type="button" name="Brooklyn">Brooklyn</button>
						<button class="clarendon" id="Clarendon" type="button" name="Clarendon">Clarendon</button>
						<button class="earlybird" id="Earlybird" type="button" name="Earlybird">Earlybird</button>
						<button class="gingham" id="Gingham" type="button" name="Gingham">Gingham</button>
						<button class="Hudson" id="Hudson" type="button" name="Hudson">Hudson</button>
						<button class="inkwell" id="Inkwell" type="button" name="Inkwell">Inkwell</button>
						<button class="lark" id="Lark" type="button" name="Lark">Lark</button>
						<button class="lofi" id="Lo-Fi" type="button" name="Lo-Fi">Lo-Fi</button>
						<button class="mayfair" id="Mayfair" type="button" name="Mayfair">Mayfair</button>
						<button class="moon" id="Moon" type="button" name="Moon">Moon</button>
						<button class="nashville" id="Nashville" type="button" name="Nashville">Nashville</button>
						<button class="perpetua" id="Perpetua" type="button" name="Perpetua">Perpetua</button>
						<button class="reyes" id="Reyes" type="button" name="Reyes">Reyes</button>
						<button class="rise" id="Rise" type="button" name="Rise">Rise</button>
						<button class="slumber" id="Slumber" type="button" name="Slumber">Slumber</button>
						<button class="toaster" id="Toaster" type="button" name="Toaster">Toaster</button>
						<button class="walden" id="Walden" type="button" name="Walden">Walden</button>
						<button class="willow" id="Willow" type="button" name="Willow">Willow</button>
						<button class="xpro2" id="X-pro-II" type="button" name="X-pro-II">X-pro II</button>
						<button class="sepia" id="Sepia" type="button" name="Sepia">Sepia</button>
						<button class="blur" id="Blur" type="button" name="Blur">Blur</button>
					</div>
				</li>
				<li id='tab-upload' class='hidden'>Image Upload</li>
			</ul>
			<div id='no-camera' class='hidden'>
				<input type='file' name='fileToUpload' id='fileToUpload' />
			</div>
		</div>
		<div id='bottom-right-app' class='last-taken'>
			<?php
				if (isset($results)) {
					?> <ul class='last-taken'>
						<li><h2>Last 4 photos taken: </h2><?php
						foreach ($results as $img) { ?>
							<div class='gallery-single-small' id='<?php echo $img['id']; ?>'>
								<a href='single/<?php echo $img['id']; ?>'>
									<img src='<?php echo $img['base_64']; ?>' alt='img-<?php echo $img['id']; ?>'/>
								</a>
							</div>
				<?php }
				} ?>
					</li>
				</ul>
		</div>
	</div>
</div>
<script type='text/javascript' src='./public/js/app.js'></script>
