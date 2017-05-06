<?php
	function imageMerge($img, $logo, $x, $y, $width_img, $height_img) {
		$cut = imagecreatetruecolor($width_img, $height_img);
		imagecopy($cut, $img, 0, 0, $x, $y, $width_img, $height_img);
		imagecopy($cut, $logo, 0, 0, 0, 0, 200, 200);
		imagecopymerge($img, $cut, $x, $y, 0, 0, $width_img, $height_img, 100);
	}
 ?>
