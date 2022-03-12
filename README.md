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

## Xác thực captcha
```php
$captcha_result = '';

//Kiểm tra (true|false)
$check = (new CaptchaGen)->Valid($captcha_result);

//Xóa log captcha
(new CaptchaGen)->Clear();
```
## Tùy chỉnh captcha


## Tùy chỉnh ảnh gif
### Tùy chỉnh

* **getPhrase** - Lấy kết quả captcha
* **setWidth** - Chiều rộng ảnh, px (Mặc định 150px)
* **setHeight** - Chiều cao ảnh, px  (Mặc định 40px)
* **setTextColor** - Màu chữ
* **setBackgroundColor** - Màu nền
* **setFont** - Đường dẫn tới file font
* **setWindowWidth** - Chiều rộng cửa sổ, px (Mặc định 75px)
* **setPixelPerFrame** - Chiều cao cửa sổ, px  (Mặc định 15px)
* **setDelayBetweenFrames** - Thời gian giữa các khung hình, ms  (Mặc định 20ms)
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
