<?php 

require_once("db_inf.php");

class UserLogic{
    /**ユーザー登録の関数
     * @pram  array $userdata
     * @return  bool $result
    */
    public static function createUser($userdata){

        
        $sql_user = 'INSERT INTO users (name,password) VALUES(?,?)';
        //ユーザーのデータを配列に入れる
        $array = [];
        $array[] = $userdata['username'];//POSTで受け取った値
        $array[] = password_hash($userdata['password'],PASSWORD_DEFAULT);
        $result = false;

        try{
            $stmt=connect()->prepare($sql_user);

            $result = $stmt->execute($array);//配列はここで入れる
            return $result;
        }catch(\Exception $e){
            return $result;
        }
    }

    /**
     * ログインする
     * @param string $username,$password
     * @return bool $result 
     */    
    public static function login($username,$password){

        $result = false;
        //ユーザーをデータベースから検索して取得
        
        $sql_getUser = 'SELECT * from users WHERE name = ?';
        
        $arr = [];
        $arr[]= $username;
        
        
        try{
            $stmt = connect()->prepare($sql_getUser);
            $stmt->execute($arr);
            $user = $stmt->fetch();
            return $user;
        } catch(\Exception $e){
            return false;
        }


        if(!$user){
            $_SESSION['E_msg']="ユーザー名が違います";
            return $result;
        }

        if(password_verify($password,$user['password'])){
            
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;
            $result= true;
            return $result;
         } else{
         
         $_SESSION['E_msg']="パスワードが違います";
         return $result;
         }
    }

    /**
     * ログインしているか調べる。
     * @param string void
     * @return bool $result
     */
    public static function checklogin(){
        $result=false;
        
        if(isset($_SESSION['login_user'])&&($_SESSION['login_user']['id']>0)){
            return $result = true;
        }


        if(!$result){
        $_SESSION['login_err'] = 'ユーザーを登録してください。';
        header('Location:resister.php');
        return;
        }

    }

    /**
     * ログアウト処理
     */
    public static function logout(){
        $_SESSION =array();
        session_destroy();
        
    }

    public static function getbookData(){
        $dbh=connect();
        $sql_getbooks = "SELECT * FROM books ORDER BY id desc";

        try{
        $stmt_getbooks =$dbh ->query($sql_getbooks)->fetchALL(PDO::FETCH_ASSOC);
        $book= $stmt_getbooks;
        return $book;
        $dbh=null;
        }catch(\Exception $e){
            return false;
        }

    }   


    public static function resister_book($bookdata){
        connect();
        $sql_creatbook =  "INSERT INTO books (title,date,stock) VALUES (:title, :date,:stock)";

        $result = false;

        try{
            $stmt=connect()->prepare($sql_creatbook);
            $stmt->bindParam(':title',$bookdata['title'],PDO::PARAM_STR);
            $stmt->bindParam(':date',$bookdata['releasedate'],PDO::PARAM_STR);
            $stmt->bindParam(':stock',$bookdata['stock'],PDO::PARAM_INT);
            
            $result=$stmt->execute();
            return $result;

            }catch(\Exception $e){
                $e->getMessage();

                exit($e);
            }

    }




   



}
    









?>