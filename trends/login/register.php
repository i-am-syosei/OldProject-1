<?php
session_start();
require_once 'UserLogic.php';

// エラーメッセージ
$err = [];


$token = filter_input(INPUT_POST, 'csrf_token');


//トークンがない、もしくは一致しない場合、処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエスト');
}

unset($_SESSION['csrf_token']);

//バリデーション
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err[] = 'メールアドレスを入力してください';
}
$password = filter_input(INPUT_POST, 'pass');
//正規表現
if (!preg_match("/\A[a-z\d]{4,100}+\z/i", $password)) {
    $err[] = 'パスワードは英数字4文字以上にしてください';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
    $err[] = '確認用パスワードと異なっています';
}
if (count($err) === 0) {
    //ユーザーを登録する処理
    $hasCreated = UserLogic::createUser($_POST);

    if (!$hasCreated) {
        $err[] = '登録失敗';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <title>ユーザー登録完了</title>
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
        <div class="content">
        <?php if (count($err) > 0) : ?>
            <?php foreach ($err as $e) : ?>
                <p><?php echo $e ?></p>
            <?php endforeach ?>
        <?php else : ?>
            <p>ユーザー登録完了しました</p>
        <?php endif ?>

        <a href="login_form.php">戻る</a>
        </div>
        
</body>

</html>
