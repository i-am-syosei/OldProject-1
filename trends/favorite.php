<?php
include("thred.php");
?>
<!DOCTYPE html>
<html>
  <link rel="icon" type="image/x-icon" href="./favicon.ico">


<head>
  <title>トレンド掲示板</title>
  <meta charset="UTF-8" />
  <link href="../style.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
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
            $mypage = '<li><a href="login/mypage.php"><img src="../../trends/img/mypage.png" id="mypage"></a></li>';
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
          <li class="sidebar-item"><a href="main.php" class="sidebar-anchor">
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

      <div class="rank">
          <div class="contenttitle">
            <h1>お気に入り</h1>
            
          </div>

          <?php

          $users = 0;
          if (isset($_POST["country"])) {
            $country = $_POST["country"];
            $_SESSION['country'] = $country;
          }
          $i = 0;
          if(isset($_SESSION['login_user']['user_id'])){
            $users = $_SESSION['login_user']['user_id'];
          while (true) {              
            $res = $pdo->query("SELECT DISTINCT news.title_name FROM news,favorite WHERE favorite.country = 0 && favorite.title_id = news.title_id && favorite.user_id = $users LIMIT $i ,1");
            $res->execute();
            $user = $res->fetch();
            if ($user == null) {
              break;
            }
            $page = $user['title_name'];
            $hoge = '<a href="../../trends/favorite.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a><br>';
            print($hoge);
            $i = $i + 1;
          }
          $i = 0;
          while (true) {
            $res = $pdo->query("SELECT DISTINCT news_us.title_name FROM news_us,favorite WHERE favorite.country = 1 && favorite.title_id = news_us.title_id && favorite.user_id = $users LIMIT $i ,1");
            $res->execute();
            $user = $res->fetch();
            if ($user == null) {
              break;
            }
            $page = $user['title_name'];
            $hoge = '<a href="../../trends/favorite.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a><br>';
            print($hoge);
            $i = $i + 1;
          }
          $i = 0;
          while (true) {
            $res = $pdo->query("SELECT DISTINCT news_ind.title_name FROM news_ind,favorite WHERE favorite.country = 2 && favorite.title_id = news_ind.title_id && favorite.user_id = $users LIMIT $i ,1");
            $res->execute();
            $user = $res->fetch();
            if ($user == null) {
              break;
            }
            $page = $user['title_name'];
            $hoge = '<a href="../../trends/favorite.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a><br>';
            print($hoge);
            $i = $i + 1;
          }
        }
          ?>
          </ul>
      
      </div>
      <div class="thread">
        <?php
        if ($s != "favorite.php") {
          include("trend.php");
        } else {
          print("ランキングを選んでください");
        }
        ?>

      </div>
    </div>
    
  </div>
</body>

</html>
