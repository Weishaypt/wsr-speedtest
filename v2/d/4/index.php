<?php
$alphabet = '123456789qwertyuiopasdfghjklzxcvbnm';

$arr = str_split($alphabet);

$str = '';

for ($i = 0; $i < 9; $i++) {
    $str .= $arr[random_int(0, count($arr) - 1)];
}


$image = imagecreatetruecolor(400, 200);
$red = imagecolorallocate($image, 255, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image, 0, 0, 400, 200, $red);
$font_file = 'E:\xampp3\htdocs\wsr-speedtest\v2\d\4\Roboto.ttf';

imagefttext($image, 30, 0, 150, 50, $white, $font_file, "test");
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);