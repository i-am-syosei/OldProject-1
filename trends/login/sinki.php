<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <form name="login_form">
        <div class="login_form_top">
            <h2>新規登録</h2>
        </div>
        <div class="login_form_btm">
            <input type="id" required="required" name="user_id" placeholder="ユーザーIDを入力してください" ><br>
            <input type="password" required="required" name="password"placeholder="パスワードを入力してください" >
            <input type="password" required="required" name="password2"placeholder="もう一度パスワードを入力してください" >
        </div>
        <button type="submit">新規登録</button>
    </form>
</body>
</html>