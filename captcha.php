<?php
require_once "libs/GifEncoder.php";
require_once "libs/CaptchaGen.php";
require_once "libs/CaptchaBuilder.php";

header('Content-Type: image/gif');
$check = (new CaptchaGen)->Auto();
$captcha = new CaptchaBuilder($check);
$captcha
    ->setWidth(150)
    ->setHeight(50)
    ->setTextColor(99, 222, 0)
    ->setBackgroundColor(0, 0, 0)
    ->setFont('fonts/luximri.ttf')
    ->setWindowWidth(49)
    ->setPixelPerFrame(13)
    ->setDelayBetweenFrames(13);

die($captcha->render());