<?php
session_start();
require_once 'UserLogic.php';
require_once 'functions.php';

$result = UserLogic::checkLogin();
if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録後ログインしてください';
    header('Location: signup_form.php');
    return;
}

$login_user = $_SESSION['login_user']

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>トレンド掲示板</title>
    <meta charset="UTF-8" />
    <link href="../style.css" rel="stylesheet" />
</head>

<body>
    <div class="app">
    <div class="header">
      <div class="top">
        <a href="main.php"><img src="../../trends/img/elements.gif" alt="ホームへ"></a>
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
            $mypage = '<a href="../login/mypage.php" ><img src="../../trends/img/mypage.png" id="mypage"></a>';
            print $mypage;
          } else {
            $nc = '<li><a href="login/signup_form.php"><img src="../../trends/img/sign.png" alt="新規登録"></a></li>';
            $login = '<li><a href="login/login.php"><img src="../../trends/img/login2.png" alt="ログイン"></a></li>';
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
                <h2>マイページ</h2><br>
                <div class="mypage">
                    <p>メールアドレス:<?php echo h($login_user['email']) ?></p>
                </div>

                <div class = "mypage">
                    <a href="../main.php">メインページへ</a>
                </div>
                <div class = "abc">
                    <form action="logout.php" method="POST">
                        <input type="submit" name="logout" value="ログアウト">
                    </form>
                </div>
                
            </div>



        </div>



</body>

</html>
