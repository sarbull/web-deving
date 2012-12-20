<?php

// Setting the content type to png
header("Content-Type: image/png");

//Get data via GET method
@$_GET['width'] ? $width = $_GET['width'] : $width = 200;
@$_GET['height'] ? $height = $_GET['height'] : $height = 200;
@$_GET['text'] ? $name = $_GET['text'] : $name = "demo-text";

// Formatted text that appears in the middle of the generated image
$text = $width . "px-" . $height . "px-" . $name . ".png";

// Create the image
$im = imagecreatetruecolor($width, $height);
$light_grey = imagecolorallocate($im, 238, 238, 238);

// Make the background color
$dark_grey = imagecolorallocate($im, 80, 80, 80);
imagefill($im, 0, 0, $light_grey);

//Generated font size
$font_size = 4;

//Length of the inserted text used in the x position
$text_length = strlen($text);

// Positions on the generated image
$x = ($width/2) - (4*$text_length);
$y = ($height/2) - $font_size;

//Generated text
imagestring($im, $font_size, $x, $y,  $text, $dark_grey);

// Return the image as png
imagepng($im);
imagedestroy($im);

?>
