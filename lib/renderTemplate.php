<?php
	function renderTemplate($pathTemplate) {
		ob_start();
		include($pathTemplate);
		$out = ob_get_contents();
		ob_end_clean();
		echo $out;
	}
 ?>
