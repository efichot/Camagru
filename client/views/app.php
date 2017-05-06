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
		<div id='top-right-app' class='preview'>
			<!-- hidden -->
			<canvas class='hidden' id='canvas' width='' height=''></canvas>
			<!-- div for image -->
			<div id='logo' style='position:absolute;width:200px;height:200px;z-index:100;top:600px;left:0px;background:url("");background-size:cover;'>
			</div>
		</div>
	</div>
	<div class='bottom-app'>
		<div id='bottom-left-app' class='tabs'>
			<ul id='tab-header'>
				<li id='tab-obj'>
					Objects
					<div id='objects'>
						<ul class='objects'>
							<li><img class='object action Troll' src='./public/img/troll.png' /></li>
							<li><img class='object action nyancat' src='./public/img/nyancat.png' /></li>
							<li><img class='object action 4chan' src='./public/img/4chan.png' /></li>
							<li><img class='object action Forever-Alone' src='./public/img/Forever-Alone.png' /></li>
							<li><img class='object action grumpy' src='./public/img/grumpy.png' /></li>
							<li><img class='object action My-Little-Pony' src='./public/img/My-Little-Pony.png' /></li>
							<li><img class='object action palmier' src='./public/img/palmier.png' /></li>
							<li><img class='object action smiley' src='./public/img/smiley.png' /></li>
							<li><img class='object action Thug-life' src='./public/img/Thug-life.png' /></li>
							<li><img class='object action bob-eponge' src='./public/img/bob-eponge.png' /></li>
							<li><img class='object action grenouille' src='./public/img/grenouille.png' /></li>
							<li><img class='object action Pedobear' src='./public/img/Pedobear.png' /></li>
							<button type='button' class='btn disabled' id='snap' disabled>Take snapshot</button>
						</ul>
					</div>
				</li>
				<li id='tab-filters'>
					Filters
					<div id='filters'>
						<button class="action " id="Normal" type="button" name="Normal">Normal</button>
						<button class="action _1977" id="1977" type="button" name="1977">1977</button>
						<button class="action aden" id="Aden" type="button" name="Aden">Aden</button>
						<button class="action brooklyn" id="Brooklyn" type="button" name="Brooklyn">Brooklyn</button>
						<button class="action clarendon" id="Clarendon" type="button" name="Clarendon">Clarendon</button>
						<button class="action earlybird" id="Earlybird" type="button" name="Earlybird">Earlybird</button>
						<button class="action gingham" id="Gingham" type="button" name="Gingham">Gingham</button>
						<button class="action Hudson" id="Hudson" type="button" name="Hudson">Hudson</button>
						<button class="action inkwell" id="Inkwell" type="button" name="Inkwell">Inkwell</button>
						<button class="action lark" id="Lark" type="button" name="Lark">Lark</button>
						<button class="action lofi" id="Lo-Fi" type="button" name="Lo-Fi">Lo-Fi</button>
						<button class="action mayfair" id="Mayfair" type="button" name="Mayfair">Mayfair</button>
						<button class="action moon" id="Moon" type="button" name="Moon">Moon</button>
						<button class="action nashville" id="Nashville" type="button" name="Nashville">Nashville</button>
						<button class="action perpetua" id="Perpetua" type="button" name="Perpetua">Perpetua</button>
						<button class="action reyes" id="Reyes" type="button" name="Reyes">Reyes</button>
						<button class="action rise" id="Rise" type="button" name="Rise">Rise</button>
						<button class="action slumber" id="Slumber" type="button" name="Slumber">Slumber</button>
						<button class="action toaster" id="Toaster" type="button" name="Toaster">Toaster</button>
						<button class="action walden" id="Walden" type="button" name="Walden">Walden</button>
						<button class="action willow" id="Willow" type="button" name="Willow">Willow</button>
						<button class="action xpro2" id="X-pro-II" type="button" name="X-pro-II">X-pro II</button>
						<button class="action sepia" id="Sepia" type="button" name="Sepia">Sepia</button>
						<button class="action blur" id="Blur" type="button" name="Blur">Blur</button>
					</div>
				</li>
				<li id='tab-upload' class='hidden'>Image Upload
					<div id='no-camera' class='hidden'>
						<input type='file' name='fileToUpload' id='fileToUpload' />
					</div>
				</li>
			</ul>
			<img class='hidden return-img' id='return-img' src='' alt='return-img' />
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
<script type='text/javascript' src='./public/js/filter.js'></script>
<script type='text/javascript' src='./public/js/action.js'></script>
<script type='text/javascript' src='./public/js/app.js'></script>
