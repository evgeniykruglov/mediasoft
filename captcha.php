<?php
function create_image()
{
global $image;
$image = imagecreatetruecolor(300, 150) or die("Cannot Initialize new GD image stream");
    $red = imagecolorallocate($image, 255, 0, 0);
    $green = imagecolorallocate($image,   0, 255,   0);
    $blue = imagecolorallocate($image,   0, 0, 255);
    $black = imagecolorallocate($image,   0, 0, 0);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 255, 255);
$line_color = imagecolorallocate($image, 64, 64, 64);
$pixel_color = imagecolorallocate($image, 0, 0, 255);
    $colors=array($red, $green, $blue);

imagefilledrectangle($image, 0, 0, 300, 150, $background_color);
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $len = strlen($letters);

    $text_color = imagecolorallocate($image, 0, 0, 0);
    for ($i = 0; $i < 6; $i++) {
        $tempimg = imagecreatetruecolor(60, 60);
        imagefilledrectangle($tempimg, 0,0,100,100,$background_color);
        $letter = $letters[rand(0, $len - 1)];
        imagestring($tempimg, 7, 10, 10, $letter, $black);

        $temp = imagerotate($tempimg, rand(-30,30), $background_color);


        imagecopy($image,$temp, 50 + $i*30, rand(20, 120), 0,0, 30, 30);
        imagedestroy($temp);
        imagedestroy($tempimg);
    }

for ($i = 0; $i < 13; $i++) {

imageline($image, 0, rand() % 150, 300, rand() % 150, $colors[rand(0,2)]);
}

for ($i = 0; $i < 10000; $i++) {
imagesetpixel($image, rand() % 300, rand() % 150, $colors[rand(0,2)]);
}



$word = "";



header("Content-type: image/png");
imagepng($image);

}

create_image();