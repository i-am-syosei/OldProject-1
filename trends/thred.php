<?php
session_cache_limiter('none');
session_start();
require_once 'dbconnect.php';
$pdo_conn = connect();
$country = 'JP';
if (isset($_SESSION['country'])) {
  $country = $_SESSION['country'];
}
?>
<?php
if ($country == "JP") {
  $news = "news";
  $cm = "comments";
  $country_id = 0;
} else if ($country == "US") {
  $news = "news_us";
  $cm = "comments_us";
  $country_id = 1;
} else if ($country == 'IND') {
  $news = "news_ind";
  $cm = "comments_ind";
  $country_id = 2;
}

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

$uri = rtrim($_SERVER["REQUEST_URI"], '/');
$uri = substr($uri, strrpos($uri, '/') + 1);

$_SESSION['uri'] = urldecode($uri);




$url = "https://www.google.com/search?q=" . $uri;
$google = '<a href="' . $url . ' "target="_blank" rel="noopener noreferrer">検索する</a>';



include("date.php");
include("ipId.php");
if (isset($_POST['comment'])) {
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $name  = htmlspecialchars($name, ENT_QUOTES);
  $comment  = htmlspecialchars($comment, ENT_QUOTES);
}
$s = urldecode($uri);
$stmt = $pdo->prepare("SELECT * FROM `$news` WHERE title_name = :url");
$stmt->bindValue(':url', $s, PDO::PARAM_STR);
$stmt->execute();
while ($resister = $stmt->fetch()) :
  $titleId = $resister['title_id'];
endwhile;


if (isset($titleId)) {
  $entry = $pdo->query("SELECT *  FROM $cm WHERE title_id = $titleId ");
}
if (isset($_POST['add'])) {
  $_SESSION['page'] = true;
  if ($comment != "") {
    if ($name == "") {
      $name = "匿名";
    }
    if(isset($titleId)){
    $pdo->query('INSERT INTO ' . $cm . ' SET name = "' . $name . '" , comment = "' . $comment . '" , day = "' . $day . '" , ip_id = "' . $ip_id . '" , title_id ="' . $titleId . '"'); //コメントをDBへ挿入
    }
    $pdo->query('UPDATE ' . $news . ' SET count = count + 1 WHERE title_name = "' . urldecode($uri) . '"');
    $comment = "";
    $server = $_SERVER['PHP_SELF'];
    if (headers_sent()) {
      die("リダイレクトに失敗しました。このリンクをクリックしてください: <a href=../../../{$server}>戻る</a>");
    } else {
      header("Location: ../..{$server}");
      exit;
    }
    echo ($_SERVER['PHP_SELF'] . '<br/>');
    echo ($_SERVER['SCRIPT_NAME'] . '<br/>');
  }
} else {
}
if (isset($_POST['ad'])) {
  $pdo->query('INSERT INTO favorite SET user_id="' . $_SESSION['login_user']['user_id'] . '",title_id="' . $titleId . '",country="' . $country_id . '"');
}
?>