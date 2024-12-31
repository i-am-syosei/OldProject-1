<?php
session_start();
require_once 'UserLogic.php';

if(!$logout = filter_input(INPUT_POST,'logout')){
    exit('不正なリクエストです。');
}

//セッションが切れていたらログインしてくださいってでるように。

$result = UserLogic::checkLogin();

if(!$result){
    exit('セッションが切れましたので、ログインしなおしてください。');
}

UserLogic::logout();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
<div class="app">
        <div class="header">
            <a href="../main.php"><img src="../photo.png" alt="ホームへ" width="110%" height="110%"></a>
            <div class="title">
                <h1>トレンド掲示板</h1>
            </div>

            <div class="inner">
                <form action="search.php" method="post">
                    <p>検索したいキーワードを入力してください。</p>
                    <input type="search" name="search" placeholder="キーワードを入力">
                    <input type="submit" name="submit" value="検索">
                </form>

                <form action=" ../trends/main.php" method="post">
                    <select name="country" id="country">
                        <option value="JP">日本</option>
                        <option value="US">アメリカ</option>
                        <option value="IND">インド</option>
                        <input type="submit" value="国を変更">
                    </select>
                    <form>
                        <ul class="navi">
                            <?php

                            if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
                                $mypage = '<li><a href="logout.php">ログアウト</a></li>';
                                print $mypage;
                            } else {
                                $nc = '<li><a href="login/signup_form.php">新規登録</a></li>';
                                $login = '<li><a href="login/login.php">ログイン</a></li>';
                                print $nc;
                                print $login;
                            }
                            ?>

                        </ul>
                    </form>
            </div>
        </div>

        <div class="main">
            <div class="sidebar">
                <div class="button" id="btn">
                    <ul class="sidebar-list">
                        <li class="sidebar-item"><a href="../main.php" class="sidebar-anchor">リアルタイムランキング</a></li>
                        <li class="sidebar-item"><a href="../monthly.php" class="sidebar-anchor">月間ランキング</a></li>
                        <li class="sidebar-item"><a href="../weekly.php" class="sidebar-anchor">週間ランキング</a></li>
                        <li class="sidebar-item"><a href="../favorite.php" class="sidebar-anchor">お気に入り</a></li>
                        <li class="sidebar-item"><a href="../list.php" class="sidebar-anchor">一覧</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <h2>マイページ</h2><br>
                <div class="mypage">
                    <h2>ログアウトしました。</h2>
                </div>

                <div class = "mypage">
                    <a href="login_form.php">ログイン画面へ</a>
                </div>
                
            </div>



        </div>
    
    
</body>
</html>
