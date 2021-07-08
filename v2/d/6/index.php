<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Empty Document</title>
    <style>
        body {
            background: #000;
        }
    </style>
</head>

<body>
<?php

error_reporting(0);
function rgb2hex($rgb) {
    $hex = "#";
    $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

    return $hex; // returns the hex value including the number sign (#)
}


$source_file = "image.png";

// histogram options

$maxheight = 300;
$barwidth = 2;

$im = imagecreatefrompng($source_file);

$imgw = imagesx($im);
$imgh = imagesy($im);

// n = total number or pixels

$n = $imgw*$imgh;

$histo = array();

for ($i=0; $i<$imgw; $i++)
{
    for ($j=0; $j<$imgh; $j++)
    {

        // get the rgb value for current pixel

        $rgb = ImageColorAt($im, $i, $j);
        //echo $rgb."<br>";
        // extract each value for r, g, b

        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        // get the Value from the RGB value

        $V = round(($r + $g + $b) / 3);
        //echo $V."<br>";
        // add the point to the histogram

        $histo[$V] += $V / $n;
        $histo_color[$V] = rgb2hex([$r,$g,$b]);

    }
}
arsort($histo);
$result = array_slice($histo, 0, 3,true);
echo print_r($result);
foreach ($result as $key => $value) {
    $col = $histo_color[$key];
    echo "<p style='min-width:100px; min-height:100px; background-color: ". $col .";'></p>";
}
?>
</body>
</html>