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
            <h1>今のトレンド</h1>
            <div class="languege">
              <form action="../../trends/main.php" method="post">

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
              $res = $pdo->query("SELECT rank_title FROM rank LIMIT $i , 1");       //DBからデータを取ってくる
              $res->execute();
              $user = $res->fetch();
              $page = $user['rank_title'];
              $res = $pdo->query("SELECT title_id FROM news WHERE title_name = '$page'");
              $res->execute();
              $user = $res->fetch();
              $title_id = $user['title_id'];
              $res = $pdo->query("SELECT count(*) FROM comments WHERE title_id = '$title_id'");
              $res->execute();
              $user = $res->fetch();
              $count = $user['count(*)'];
          ?>
              <h1><?php print $i + 1 . "位" ?></h1>
              <?php
              $hoge = '<a href="../../trends/main.php/' . ($page) . '" class="btn btn-gradient" >' . $page . '</a>';
              $huga = '<br><a>' . "(コメント " . ($count) . " 件)" . '</a>';
              ?>
              <div class="trend">
                <?php print $hoge;
                print $huga;
                ?>
              </div>

            <?php
            }
          } else if ($country == "US") {
            for ($i = 0; $i < 10; $i++) {
              $res = $pdo->query("SELECT rank_title FROM rank_us LIMIT $i , 1");       //DBからデータを取ってくる
              $res->execute();
              $user = $res->fetch();
              $page = $user['rank_title'];
              $res = $pdo->query("SELECT title_id FROM news_us WHERE title_name = '$page'");
              $res->execute();
              $user = $res->fetch();
              $title_id = $user['title_id'];
              $res = $pdo->query("SELECT count(*) FROM comments_us WHERE title_id = '$title_id'");
              $res->execute();
              $user = $res->fetch();
              $count = $user['count(*)'];
            ?>
              <h1><?php print $i + 1 . "位" ?></h1>
            <?php
              $hoge = '<a href="../../trends/main.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a>';
              $huga = '<br><a>' . "(コメント " . ($count) . " 件)" . '</a>';

              print $hoge;
              print $huga;
            }
          } else if ($country == "IND") {
            for ($i = 0; $i < 10; $i++) {
              $res = $pdo->query("SELECT rank_title FROM rank_ind LIMIT $i , 1");       //DBからデータを取ってくる
              $res->execute();
              $user = $res->fetch();
              $page = $user['rank_title'];
              $res = $pdo->query("SELECT title_id FROM news_ind WHERE title_name = '$page'");
              $res->execute();
              $user = $res->fetch();
              $title_id = $user['title_id'];
              $res = $pdo->query("SELECT count(*) FROM comments_ind WHERE title_id = '$title_id'");
              $res->execute();
              $user = $res->fetch();
              $count = $user['count(*)'];
            ?>
              <h1><?php print $i + 1 . "位" ?></h1>
          <?php
              $hoge = '<a href="../../trends/main.php/' . ($page) . '" class="btn btn-gradient">' . $page . '</a>';
              $huga = '<br><a>' . "(コメント " . ($count) . " 件)" . '</a>';

              print $hoge;
              print $huga;
            }
          }
          ?>
          </ul>

        </div>
      

      <div class="thread">
        <?php
        if ($s != "main.php") {
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