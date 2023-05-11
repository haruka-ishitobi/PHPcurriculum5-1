<?php

require_once("UserLogic.php");

$err = [];

if(!$username = filter_input(INPUT_POST,'username')){
    $err[] = "ユーザー名をいれてください";
}


$password = filter_input(INPUT_POST,'password');
if(!preg_match("/[a-zA-Z0-9]{8,100}/",$password)){
    $err[] = "パスワードは英数字8文字以上100文字以内にしてください";
}

if (count($err)=== 0){

    $created = UserLogic::createUser($_POST);
    if(!$created){
        $err[] = "登録できませんでした。";
    }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=pp, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if (count($err)>0) : ?>
    <?php foreach($err as $e) : ?>
        <p><?php echo $e ?></p>    
    <?php endforeach ?>    
<?php else : ?>
    <p>登録完了！</p>
<?php endif ?>
    <a href="login.php">ログインはこちら</a>
</body>
</html>