<?php
require_once "libs/GifEncoder.php";
require_once "libs/CaptchaGen.php";
require_once "libs/CaptchaBuilder.php";

$check = (new CaptchaGen)->Valid(@$_GET['captcha']);
(new CaptchaGen)->Clear();
var_dump($check);