<?php 


session_start();
require_once("UserLogic.php");


$_SESSION['e_msg']=[];
$err = [];

if(!$username = filter_input(INPUT_POST,'username')){
    $err['username'] = "ユーザー名をいれてください";
}

if(!$password = filter_input(INPUT_POST,'password')){
    $err['password'] = "パスワードをいれてください";
}

if (count($err)>0){

    $_SESSION = $err;
    header('Location: login_form.php');
    return;
}


$result = UserLogic::login($username,$password);


$_SESSION['login_user']=$result;

if(!$result){
    header('Location: login_form.php');
    return;
}
echo "ログインしました";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="main.php">在庫一覧へ</a>
</body>
</html>