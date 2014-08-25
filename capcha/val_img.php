<?php
session_start();

$string = '';
for ($i = 0; $i < 5; $i++) {
    $string .= chr(rand(97, 122));
}

$_SESSION['captcha'] = $string; //store the captcha

$dir = '../fonts/';
$image = imagecreatetruecolor(165, 50); //custom image size
$font = "PlAGuEdEaTH.ttf"; // custom font style
$color = imagecolorallocate($image, 113, 193, 217); // custom color
$white = imagecolorallocate($image, 255, 255, 255); // custom background color
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 30, 0, 10, 40, $color, "capcha/font/angsab.ttf", $_SESSION['captcha']);

header("Content-type: image/png");
imagepng($image);





/*
session_save_path('../tmp/');
header("Content-type: image/png");
require_once("../includes/config.in.php");
require_once("../includes/function.in.php");

session_start();

$_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__FILE__));
$targetPath = $_SERVER['DOCUMENT_ROOT'];

function generateCode($characters) {
	$possible = '1234567890qazwsxedcrfvtgbyhnujmikp';
	$code = '';
	$i = 0;
	while ($i < $characters) { 
		$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
		$i++;
	}
	return $code;
}

$font = $targetPath."/capcha/font/angsab.ttf";
$code = generateCode($_GET['characters']);

$im = imagecreate($_GET['width'], $_GET['height']);  
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0); 
$new_string = tis620_to_utf8($code); 
imagefill($im, 0, 0, $black);
imageTTFText($im, 20 , 0, 6 ,18,$white,$font,$new_string);
if(ISO=='utf-8'){
	$_SESSION["security_code"] = $new_string;
} else {
	$_SESSION["security_code"] = utf8_to_tis620($new_string);
}

setcookie("security_code", $_SESSION["security_code"], time()+3600);
// var_dump($_SESSION);
// exit;

imagepng($im); 
imagedestroy($im);
*/
?>