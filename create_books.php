<?php
session_start();

require_once("UserLogic.php");
UserLogic::checklogin(); 

$err = [];

if(!$bookdata['title'] = filter_input(INPUT_POST,'title')){
    $err['title'] = "タイトルをいれてください";
}

if(!$bookdata['releasedate'] = filter_input(INPUT_POST,'release_date')){
    $err['releasedate'] = "日付をいれてください";
}

if(!$bookdata['stock'] = filter_input(INPUT_POST,'stock')){
    $err['stock'] = "在庫の数を指定してください";
}

if(count($err)>0){
    header('Location:b_resister.php');
}


$_SESSION['e_msg']= $err;

if (count($err)===0){
    $bookdata['title']=htmlspecialchars($bookdata['title'],ENT_QUOTES);
    

$resistered=UserLogic::resister_book($bookdata);
if(!$resistered){
    echo '登録に失敗しました';
    
}

if($resistered){
    echo "登録完了！";
}

}
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
    <a href="main.php">在庫一覧を確認する</a>
</body>
</html>