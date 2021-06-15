<?php
/*header ("Content-type: image/png");
$im = ImageCreate ($width = 200, $height = 100)
or die ("Ошибка при создании изображения");
$couleur_fond = ImageColorAllocate ($im, 255, 0, 0);
putenv( 'GDFONTPATH=' . realpath('.') ); //проверяет путь
$font = 'Arial';//шрифт текста
$fontsize = 14;// размер текста
$letters = 'ABCDEFGKIJKLMNOPQRSTUVWXYZ'; // алфавит
$captcha = '';//обнуляем текст
$caplen = 4;
for ($i = 0; $i < $caplen; $i++)
{
    $captcha .= $letters[ rand(0, strlen($letters)-1) ]; // дописываем случайный символ из алфавила
    $x = ($width - 20) / $caplen * $i + 10;//растояние между символами
    $x = rand($x, $x+4);//случайное смещение
    $y = $height - ( ($height - $fontsize) / 2 ); // координата Y
    $curcolor = ImageColorAllocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
    $angle = rand(-25, 25);//случайный угол наклона
    imagettftext($im, $fontsize, $angle, $x, $y, $curcolor, $font, $captcha[$i]); //вывод текста
}
ImagePng ($im);*/
// Тип содержимого
header('Content-Type: image/png');

// Создание изображения
$im = imagecreatetruecolor(400, 30);

// Создание цветов
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// Текст надписи
$text = 'Тест...';
// Замена пути к шрифту на пользовательский
$font = 'arial.ttf';



imagepng($im);
imagedestroy($im);
