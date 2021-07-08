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

$str_arr = str_split($str);
$x = 20;
$y = 20;
$angle = 0;
$size = 30;
foreach ($str_arr as $item)  {
    $size = random_int(25, 35);
    $y += $size / 2 + 1;
    $x += $size / 2 + 20;
    $angle = random_int(-30, 30);
    imagefttext($image, $size, $angle, $x, $y, $white, $font_file, $item);
}
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);