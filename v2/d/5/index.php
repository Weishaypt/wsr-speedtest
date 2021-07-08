<?php
$image = imagecreatefromjpeg('image.jpg');
$watermark = imagecreatefrompng('logo.png');

$sx = imagesx($watermark);
$sy = imagesy($watermark);

imagecopy($image, $watermark, imagesx($image) - $sx, imagesy($image) - $sy, 0, 0, $sx, $sy);
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);