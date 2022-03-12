<?php
?>
<!doctype html>
<html lang="vi">
<head>
    <title>Captcha</title>
<style>
    body{
        background: #5ba1cf;
        height: 100vh;
        font-family: Quicksand, sans-serif;
    }
    .container{
        width:100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .form {
        background: #f2d5d4;
        margin: 0 13px;
        padding: 10px;
        height: auto;
        width: 100%;
        border-radius: 13px;
        -moz-box-shadow: 1px 1px 4px 0 #666;
        -webkit-box-shadow: 1px 1px 4px 0 #666;
        box-shadow: 1px 1px 4px 0 #999;
        display: inline-block;
        justify-content: center;
        align-items: center;
    }
    @media(min-width:666px){.form{width:654px}}
    h3{text-align: center}
    .input-group {
        display: flex;
        align-content: stretch;
        margin: 13px;
        border-radius: 6px;
        background: #666;
    }

    .input-group > input {
        flex: 1 0 auto;
        height: 50px;
        border: 1px solid #666;
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
        font-size: 23px;
    }
    input{
        padding-left: 7px;
    }
    .input-img {
        height: 54px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .input-img > img {
        height: 52px;
        width: auto;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        border: 1px solid #000;
    }
    button {
        margin: 13px;
        margin-top: 0px;
        width: auto;
        height: 40px;
        font-size: 18px;
        border: 1px solid #5ba1cf;
        background: #5ba1cf;
        color: white;
        border-radius: 3px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="form">
        <form action="valid.php" method="get">
            <h3><label for="input">Nhập Captcha</label></h3>
            <div class="input-group">
                <input name="captcha" id="input">
                <div class="input-img">
                    <img src="captcha.php" alt="Captcha">
                </div>
            </div>
            <button type="submit">KIỂM TRA</button>
        </form>
    </div>
</div>
</body>
</html>