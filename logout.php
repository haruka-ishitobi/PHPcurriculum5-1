<?php
session_start();
require_once("UserLogic.php");

if(!$logout=filter_input(INPUT_POST,'logout')){
    exit('不正なリクエストがありました');
}

$result = false;


$result=UserLogic::checklogin();        


if(!$result){
    exit('セッションがきれました。ログインをし直してください。');
}

UserLogic::logout();



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    <h1>ログアウト画面</h1>
    <div>ログアウトしました。</div>
    <a href="login_form.php">ログインはこちら</a>
</body>
</html>