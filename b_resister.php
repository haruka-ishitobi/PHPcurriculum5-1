<?php 
session_start();
require_once("UserLogic.php");


$err=$_SESSION['e_msg'];
$_SESSION['e_msg']=array();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本登録画面</title>
</head>
<body>
<h1>本登録画面</h1>
    
    <form action="create_books.php" method="POST">
        <p><input type="text" name="title"placeholder="タイトル"></p>
        <?php if (isset($err['title'])) : ?>
                    <p><?php echo $err['title'] ; ?></p>
                <?php endif; ?>
        <p><input type="date" name="release_date"></p>
        <?php if (isset($err['releasedate'])) : ?>
                    <p><?php echo $err['releasedate'] ; ?></p>
                <?php endif; ?>
        <p>在庫</p>
        <?php if (isset($err['stock'])) : ?>
                    <p><?php echo $err['stock'] ; ?></p>
                <?php endif; ?>
        <select name="stock">
        <?php for ($i=1; $i<=100;$i++){?>
            <option value="<?php echo $i;?>">
            <?php echo $i; ?>
            </option>
        <?php } ?>
        </select>

        <p><input type="submit" value="登録"></p>
    </form>
</body>
</html>