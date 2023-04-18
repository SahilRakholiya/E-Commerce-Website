<?php
	session_start(); 
	$text = rand(10000,99999); 
	$_SESSION["captcha"] = $text; 
	$height = 50; 
	$width = 65;   
	// Create the size of image or blank image
	$image_p = imagecreate($width, $height); 

	// Set the background color of image ( $image, $red, $green, $blue )
	$black = imagecolorallocate($image_p, 0, 0, 0); 

	// Set the text color of image 
	$white = imagecolorallocate($image_p, 255, 255, 255); 
	$font_size = 20; 

	// Function to create image which contains string. 
	//The imagestring() function is an inbuilt function in PHP which is used to draw the string horizontally. This function draws the string at given position.

	//Syntax:
	//bool imagestring( $image, $font, $x, $y, $string, $textcolor )
	imagestring($image_p, $font_size, 5, 5, $text, $white); 

	//The imagejpeg() function is an inbuilt function in PHP which is used to display image to browser or file. The main use of this function is to view an image in the browser, convert any other image type to JPEG and altering the quality of the image.
	imagejpeg($image_p);
    
?>