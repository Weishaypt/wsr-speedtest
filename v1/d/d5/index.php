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
$visites = array(138, 254, 381, 652, 896, 720, 140, 556, 663, 331, 407, 768);

header ("Content-type: image/png");
$largeurImage = 400;
$hauteurImage = 300;
$im = ImageCreate ($largeurImage, $hauteurImage)
or die ("Ошибка при создании изображения");
$blanc = ImageColorAllocate ($im, 255, 255, 255);
$noir = ImageColorAllocate ($im, 0, 0, 0);
$bleu = ImageColorAllocate ($im, 0, 0, 255); 
