# PHPCaptcha
Simple library for create animate captcha with php
## Examples

### Captcha nhập chữ
![example1](demo/1.gif)
### Captcha bắt tính toán
![example2](demo/2.gif)

```php
require_once "libs/GifEncoder.php";
require_once "libs/CaptchaGen.php";
require_once "libs/CaptchaBuilder.php";
```

## Sử dụng nhanh

```php
header('Content-Type: image/gif');

//Tạo captcha
$check = (new CaptchaGen)->Auto(); #Cả 2 dạng bên dưới
// $check = (new CaptchaGen)->Auto(); #Captcha dạng chữ
// $check = (new CaptchaGen)->Calc(); #Captcha dạng tính

//Tạo ảnh
$captcha = new CaptchaBuilder($check);

//Xuất ảnh
die($captcha->render());
```

## Tùy chỉnh ảnh gif
### Methods

* **getPhrase** - Get phrase
* **setWidth** - Image width, px (Optional, default 150px)
* **setHeight** - Image height, px  (Optional, default 40px)
* **setTextColor** - Text color  (Optional)
* **setBackgroundColor** - Background color  (Optional)
* **setFont** - Font path  (Optional)
* **setWindowWidth** - Window width, px  (Optional, default 75px)
* **setPixelPerFrame** - Window shift per frame, px  (Optional, default 15px)
* **setDelayBetweenFrames** - Time between frames, ms)  (Optional, default 20ms)
```php
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
```
