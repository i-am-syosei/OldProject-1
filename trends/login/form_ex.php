<?php
session_start();

require_once 'functions.php';
require_once 'UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <link href="../style.css" rel="stylesheet" />
    <title>Login</title>
</head>

<body>
    <div class="app">
        <div class="header">
            <a href="../main.php"><img src="../photo.png" alt="ホームへ" width="110%" height="110%"></a>
            <div class="title">
                <h1>トレンド掲示板</h1>
            </div>

            <div class="inner">
                <form action="../search.php" method="post">
                    <p>検索したいキーワードを入力してください。</p>
                    <input type="search" name="search" placeholder="キーワードを入力">
                    <input type="submit" name="submit" value="検索">
                </form>

                        <ul class="navi">
                            <?php

                            if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
                                $mypage = '<li><a href="mypage.php">ログアウト</a></li>';
                                print $mypage;
                            } else {
                                $nc = '<li><a href="signup_form.php">新規登録</a></li>';
                                $login = '<li><a href="login.php">ログイン</a></li>';
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
        <body>
        <h2>ユーザー登録</h2>
        <?php if (isset($login_err)): ?>
            <p><?php echo  $login_err; ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <p>
                <label for="email">メールアドレス：</label>
                <input type="email" name="email">
            </p>
            <p>
                <label for="pass">パスワード：</label>
                <input type="password" name="pass">
            </p>
            <p>
                <label for="password_conf">パスワード確認：</label>
                <input type="password" name="password_conf">
            </p>
            <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
            <p>
                <input type="submit" value="新規登録">
            </p>
        </form>
        <a href="../main.php">メインページへ</a><br>
        <a href="login.php">ログインフォームはこちら</a>
</body>
        </div>
    </div>
</div>
</body>

</html>


