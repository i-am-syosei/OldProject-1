<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>sinki</title>
</head>
<body>
        <div class="login_form_top">
            <h2>新規登録</h2>
        </div>
            <form action="register.php" method="POST">
                <p>
                    <label for="username">メールアドレス:</label>
                    <input type="text" name="email">
                </p>
                <p>
                    <label for="password">パスワード:</label>
                    <input type="password" name="password">
                </p>
                <p>
                    <label for="passwordconf">パスワード確認:</label>
                    <input type="password" name="password_conf">
                </p>
                <p>
                    <input type="submit" value="登録">
                </p>
            </form>
</body>
</html>