<?php 
	
	if (isset($_SESSION['captcha'])) {
		unset($_SESSION['captcha']);
	}

	session_start();
	$string1 = "abcdefghijkmnopqrstuvwxyz";
	$string2 = "1234567890";
	$string = $string1.$string2;
	$string = str_shuffle($string);
	$rand = substr($string, 0,5);
	$_SESSION['captcha'] = $rand;

	$myimg = imagecreatetruecolor(100, 30);
	$background = imagecolorallocate($myimg, 199, 144, 225);
	$text_color = imagecolorallocate($myimg, 245, 245, 245);
	imagestring($myimg, 12, 25, 8, $rand, $text_color);
	header('Content-Type:image/png');
	imagepng($myimg);
	imagedestroy($myimg);
?>