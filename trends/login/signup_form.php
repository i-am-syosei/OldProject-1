<?php
session_start();

require_once 'functions.php';
require_once 'UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <title>signu_form</title>
</head>

<body>

    <div class="header">
        <div class="top">
            <a href="../main.php"><img src="../../trends/img/elements.gif" alt="ホームへ"></a>
        </div>

        <div class="title">
            <img src="../../trends/img/torend.png">
        </div>

        <div class="search">
            <div class="search-box">
                <form id="form1" action="../../trends/search.php" method="post">
                    <input id="sbox" type="search" name="search" placeholder="キーワードを入力">
            </div>


            <div class="search-btn">
                <input id="sbtn" type="image" src="../../trends/img/search.png" name="submit" value="検索">
            </div>

            </form>
        </div>
        <div class="login">

            <?php
            if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
                $mypage = '<li><a href="login/mypage.php"><img src="../../trends/img/mypage.png"id="mypage"></a></li>';
                print $mypage;
            } else {
                $nc = '<li><a href="../login/signup_form.php"><img src="../../trends/img/sign.png" alt="新規登録"></a></li>';
                $login = '<li><a href=""><img src="../../trends/img/login2.png" alt="ログイン"></a></li>';
                print $nc;
                print $login;
            }
            ?>

        </div>

    </div>

    <div class="main">
        <div class="sidebar">

            <ul class="sidebar-list">
                <h1>ランキング</h1>
                <li class="sidebar-item"><a href="../main.php" class="sidebar-anchor">
                        <div id="btn2">リアルタイム</div>
                    </a></li>
                <li class="sidebar-item"><a href="../../trends/monthly.php" class="sidebar-anchor">月間</a></li>
                <li class="sidebar-item"><a href="../../trends/weekly.php" class="sidebar-anchor">週間</a></li>
                -------------

                <h1>その他</h1>
                <li class="sidebar-item"><a href="../../trends/favorite.php" class="sidebar-anchor">お気に入り</a></li>
                <li class="sidebar-item"><a href="../../trends/list.php" class="sidebar-anchor">一覧</a></li>
            </ul>

        </div>
        <div class="signup">



            <h2>ユーザー登録</h2>
            <?php if (isset($login_err)) : ?>
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
        </div>
    </div>
</body>

</html>