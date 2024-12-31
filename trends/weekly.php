<?php
include("thred.php");
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/x-icon" href="./favicon.ico">
<link href="../style.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" />

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
            $mypage = '<li><a href="login/mypage.php"><img src="../../trends/img/mypage.png"id="mypage"></a></li>';
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
          <li class="sidebar-item"><a href="../../trends/main.php" class="sidebar-anchor">
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
        <div class="flex-content">
          <div class="contenttitle">
            <h1>週間トレンド</h1>
            <div class="languege">
              <form action="../../trends/weekly.php" method="post">

                <form>
                  <select name="country" id="country">
                    <option value="JP">日本</option>
                    <option value="US">アメリカ</option>
                    <option value="IND">インド</option>
                    <input type="submit" value="国を変更"><br>
                  </select>
                </form>
              </form>
            </div>
          </div>

          <?php
          
          if (isset($_POST["country"])) {
            $country = $_POST["country"];
            $_SESSION['country'] = $country;
          }
          if ($country == "JP") {
            $_SESSION['country'] = $country;


            for ($i = 0; $i < 10; $i++) {

              $res = $pdo->query("SELECT title_name FROM news WHERE title_day >  (NOW() - INTERVAL 7 DAY) ORDER BY count DESC LIMIT  $i ,1");
              $res->execute();
              $user = $res->fetch();
              $page = $user['title_name'];
          ?>
              <h1><?php print $i + 1 . "位" ?></h1>
              <?php
              $hoge = '<a href="../../trends/weekly.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a>';
              ?>
              <div class="trend">
                <?php print $hoge; ?>
              </div>
            <?php
            }
          } else if ($country == "US") {


            for ($i = 0; $i < 10; $i++) {

              $res = $pdo->query("SELECT title_name FROM news_us WHERE title_day >  (NOW() - INTERVAL 7 DAY) ORDER BY count DESC LIMIT  $i ,1");
              $res->execute();
              $user = $res->fetch();
              $page = $user['title_name'];
            ?>
              <h1><?php print $i + 1 . "位" ?></h1>
              <?php
              $hoge = '<a href="../../trends/weekly.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a>';
              ?>
              <div class="trend">
                <?php print $hoge; ?>
              </div>
            <?php
            }
          } else if ($country == "IND") {
            for ($i = 0; $i < 10; $i++) {

              $res = $pdo->query("SELECT title_name FROM news_ind WHERE title_day >  (NOW() - INTERVAL 7 DAY) ORDER BY count DESC LIMIT  $i ,1");       //DBからデータを取ってくる
              $res->execute();
              $user = $res->fetch();
              $page = $user['title_name'];
            ?>
              <h1><?php print $i + 1 . "位" ?></h1>
              <?php
              $hoge = '<a href="../../trends/weekly.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a>';
              ?>
              <div class="trend">
                <?php print $hoge; ?>
              </div>
          <?php
            }
          }
          ?>
          </ul>

        </div>
      </div>
      <div class="thread">
        <?php
        if ($s != "weekly.php") {
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
