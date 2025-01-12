<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>使い方</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .submit {
            max-width: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>

<header>
    <p class="link_title"><a href="../index.php">入力</a></p>
    <p class="link_title"><a href="select.php">一覧表示</a></p>
    <p class="link_title"><a href="howtouse.php">使い方</a></p>
    <p class="link_title"><a href="logout.php">ログアウト</a></p>
    <p class="link_title"><a href="login.php">ログイン</a></p>
</header>

<body>
    <h1>ログイン</h1>
    <!-- <   !-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>
</body>

</html>