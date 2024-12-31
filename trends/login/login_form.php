<?php
session_start();

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

            <div class="content">
                <h2>ログインフォーム</h2>
                <?php if (isset($err['msg'])) : ?>
                    <p><?php echo  $err['msg']; ?></p>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <p>
                        <?php if (isset($err['email'])) : ?>
                    <p><?php echo $err['email']; ?></p>
                <?php endif; ?>
                <label for="email">メールアドレス：</label>
                <input type="email" name="email">

                </p>
                <p>
                    <?php if (isset($err['pass'])) : ?>
                <p><?php echo $err['pass']; ?></p>
            <?php endif; ?>
            <label for="pass">パスワード：</label>
            <input type="password" name="pass">

            </p>
            <p>
                <input type="submit" value="ログイン">
            </p>
                </form>
                <a href="../main.php">メインページへ</a>
                <a href="signup_form.php">新規登録はこちら</a>
            </div>
        </div>
    </div>
</body>

</html>