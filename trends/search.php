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
        <!-- <ul class="navi"> -->
        <?php
          if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
            $mypage = '<li><a href="login/mypage.php"><img src="../../trends/img/mypage.png" width=100px height=100px></a></li>';
            print $mypage;
          } else {
            $nc = '<li><a href="login/signup_form.php"><img src="../../trends/img/sign.png" alt="新規登録"></a></li>';
            $login = '<li><a href="login/login.php"><img src="../../trends/img/login2.png" alt="ログイン"></a></li>';
            print $nc;
            print $login;
          }
          ?>
        <!-- </ul> -->
      </div>
    </div>


    <div class="main">
      <div class="sidebar">
        <div class="button" id="btn">
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
      </div>

      <div class="content">
        <div class="flex-content">
          <div class="contenttitle">
            <h1>今のトレンド</h1>
          </div>


          <article>
            
              <?php
              $i = 0;
              while (true) {
                $search = $_POST['search'];
                $res = $pdo->query("SELECT DISTINCT title_name FROM news WHERE title_name LIKE '%$search%' LIMIT $i,1");
                $res->execute();
                $user = $res->fetch();
                if ($user == "") {
                  break;
                }
                ++$i;
                $page = $user['title_name'];
                $hoge = '<a href="../../trends/list.php/' . ($page) . '">' . $page . '</a><br>';
                print $hoge;
              }
              $i = 0;
              while (true) {
                $search = $_POST['search'];
                $res = $pdo->query("SELECT DISTINCT title_name FROM news_us WHERE title_name LIKE '%$search%' LIMIT $i,1");
                $res->execute();
                $user = $res->fetch();
                if ($user == "") {
                  break;
                }
                ++$i;
                $page = $user['title_name'];
                $hoge = '<a href="../../trends/list.php/' . ($page) . '">' . $page . '</a><br>';
                print $hoge;
              }
              $i = 0;
              while (true) {
                $search = $_POST['search'];
                $res = $pdo->query("SELECT DISTINCT title_name FROM news_ind WHERE title_name LIKE '%$search%' LIMIT $i,1");
                $res->execute();
                $user = $res->fetch();
                if ($user == "") {
                  break;
                }
                ++$i;
                $page = $user['title_name'];
                $hoge = '<a href="../../trends/list.php/' . ($page) . '">' . $page . '</a><br>';
                print $hoge;
              }
              ?>
            
          </article>
        </div>
      </div>
      <div class="contents">
        <?php
        if($s!="search.php"){       
        include("trend.php");
        }else{
          print("ランキングを選んでください");
        }
        ?>    
        
      </div>
    </div>
  </div>
</body>

</html>