<?php
session_start();
require_once ('UserLogic.php');


$err = array();


if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST['username'])) {
        $err[] = "ユーザー名をいれてください";
    }
    
    // パスワードが入力されていない場合の処理
    if (empty($_POST['password'])) {
        $err[] = "パスワードが未入力です。";
    }


    if(!empty($_POST['password'])&& !empty($_POST['password'])){
        $username = htmlspecialchars($_POST['username'],ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'],ENT_QUOTES);


        if(!preg_match("/[a-zA-Z0-9]{8,100}/",$password)){
            $err[] = "パスワードを英数字8文字以上100文字以内で入力してください";
        }
    }

if (count($err)=== 0){

    $created = UserLogic::createUser($_POST);
    if(!$created){
        $err[] = "登録できませんでした。";
    }
    if($created){
        header('Location:login_form.php');
    }
   
}
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録画面</title>
</head>
<body>
<h1>ユーザー登録画面</h1>
   <div>
        <?php if (count($err)>0) : ?>
            <?php foreach($err as $e) : ?>
                <p><?php echo $e ?></p>    
            <?php endforeach;?>  
        <?php endif;?>
        
            <form action="" method="POST">
                <p><input type="text" name="username" placeholder="ユーザー名"></p>
                <p><input type="password" name="password" placeholder="パスワード"></p>
                <p><input type="submit" value="新規登録"></p>
            </form>

        <a href="login_form.php">登録済みの方はこちらからログインしてください</a>    

    </div>
</body>
</html>