<?php 
session_start();
require_once ('UserLogic.php');

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <div>
        <h1>ログイン画面</h1>
        <?php if (isset($err['E_msg'])) : ?>
                    <p><?php echo $err['E_msg'] ; ?></p>
                <?php endif; ?>
                
    
            <form action="login.php" method="POST">
                <p><input type="text" name="username" placeholder="ユーザー名"></p>
                <?php if (isset($err['username'])) : ?>
                    <p><?php echo $err['username'] ; ?></p>
                <?php endif; ?>
                <p><input type="password" name="password" placeholder="パスワード"></p>
                <?php if (isset($err['password'])) : ?>
                    <p><?php echo $err['password'] ; ?></p>
                <?php endif; ?>
                
                <p><input type="submit" value="ログイン"></p>
            </form>

    </div>
    <a href="login_form.php">新規登録はこちら</a>
</body>
</html>

