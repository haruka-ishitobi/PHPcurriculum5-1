<?PHP 

session_start();
require_once("db_inf.php");
require_once("UserLogic.php");




UserLogic::checklogin();        




$id=$_GET['id'];

if (empty($id)) {
    header("Location: main.php");
    exit;
}

connect();


    

        $sql_delete="DELETE FROM books WHERE id = :id";
        try{
            $dbh=connect();
            
        $stmt_delete=$dbh->prepare($sql_delete);
        $stmt_delete->bindValue(':id',(int)$id,PDO::PARAM_INT);
        $stmt_delete->execute();
        echo "削除しました";
    }catch(\Exception $e){
        return false;
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