<?php

session_start();
require_once("UserLogic.php");

UserLogic::checklogin();

$book= UserLogic::getbookData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <a href="b_resister.php">在庫登録</a>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="ログアウト">
    </form>
    <table>
      <tr>  
        <th>タイトル</th>
        <th>発売日</th>
        <th>在庫</th>
        <th></th>
      </tr>  
      <?php foreach ($book as $column):?>
        <tr>
            
            <td><?php echo $column["title"]; ?></td>
            <td><?php echo $column["date"]; ?></td>
            <td><?php echo $column["stock"]; ?></td>
            <td><a href="delete_post.php?id=<?php echo $column["id"]; ?>">削除</a></td>
        </tr> 
        <?php endforeach; ?>
    </table>    
</body>
</html>