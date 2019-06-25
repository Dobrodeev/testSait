<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include 'reCaptchaLib.php';
// ваш секретный ключ
$secret = "6LdhbqoUAAAAAFb5Ihbqd3_srKndwx3ZXne4oCkN";

// пустой ответ
$response = null;

// проверка секретного ключа
$reCaptcha = new ReCaptcha($secret);
// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success) {
    echo 'Hello '.$_REQUEST['fio'];
}
else
    echo 'You are robot.';
?>
    <form action="" method="post">
        <input type="text" name="fio" id="fio" placeholder="fio">
        <div class="g-recaptcha" data-sitekey="6LdhbqoUAAAAAKp-NfVU8UJip04B1RxmJbck2MsO" data-theme="dark"></div>
        <input type="submit" value="send" name="send">
    </form>
    <script src='https://www.google.com/recaptcha/api.js?hl=de'></script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 14.05.2019
 * Time: 15:58
 */

?>