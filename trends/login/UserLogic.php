<?php
require_once('dbconnect.php');

class UserLogic
{
    /**
     * ユーザを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData)
    {
        $result = false;
        $sql = 'INSERT INTO users (email, pass) VALUES (?, ?)';

        // ユーザデータを配列に入れる
        $arr = [];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['pass'], PASSWORD_DEFAULT);
        try{
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        }catch(\Exception $e){
            echo $e;
            //error_log($e,3,'')
            return $result;
        }
    }

    /**
     * ログイン処理
     * @param string $email
     * @param string $pass
     * @return bool $result
     */
    public static function login($email,$pass){
        $result = false;
        //ユーザーをEmailで検索
        $user = self::getUserByEmail($email);        
        
        if(!$user){
            $_SESSION['msg']='emailが一致しません。';
            return $result;
        }
        
        //passwordの照会
        if (password_verify($pass, $user['pass'])) {
            //ログイン成功
            //echo $pass;
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;
            $result = true;
            return $result;
          }
          
        $_SESSION['msg']='パスワードが一致しません。';
        return $result;
          

    }

    /**
     * emailからユーザーを取得
     * @param string $email
     * @return array|bool $user|false
     */
    public static function getUserByEmail($email){
       //SQLの準備
       //実行
       //結果
       $sql = 'SELECT * FROM users WHERE email = ?';
        // emailを配列に入れる
        $arr = [];
        $arr[] = $email;
        try{
            $stmt = connect()->prepare($sql);
            $stmt->execute($arr);
            //SQLの結果を返す
            $user = $stmt->fetch();
            return $user;
        }catch(\Exception $e){
            return false;
        }
    }

    /**
     * ログインチェック
     * @param void
     * @return bool $result
     */
    public static function checkLogin(){
        $result = false;

        //セッションにログインユーザーがなかったらfalse
        if(isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id']>0){
            return $result = true;
        }
        return $result;
    }

    /**
     * ログアウト機能
     */
    public static function logout(){
        $_SESSION = array();
        session_destroy();
    }
}



?>