<?php
session_start();
require_once ('UserLogic.php');



$login_err=isset($_SESSION['login_err']) ? $_SESSION['login_err'] :null;
unset($_SESSION['login_err']);


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

   <div>
        <h1>ユーザー登録画面</h1>
        <?php if (isset($login_err)) : ?>
                    <p><?php echo $login_err ; ?></p>
                <?php endif; ?>
            <form action="finish.php" method="POST">
                <p><input type="text" name="username" placeholder="ユーザー名"></p>
                <p><input type="password" name="password" placeholder="パスワード"></p>
                <p><input type="submit" value="新規登録"></p>
            </form>

        <a href="login_form.php">登録済みの方はこちらからログインしてください</a>    

    </div>
</body>
</html>