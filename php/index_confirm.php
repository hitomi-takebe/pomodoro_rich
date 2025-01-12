<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta todo="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<header>
    <p class="link_title"><a href="..index.php">入力</a></p>
    <p class="link_title"><a href="select.php">一覧表示</a></p>
    <p class="link_title"><a href="howtouse.php">使い方</a></p>
    <p class="link_title"><a href="logout.php">ログアウト</a></p>
    <p class="link_title"><a href="login.php">ログイン</a></p>
</header>


<body>
    <?php
    $id    = $_GET['id'];

    //2. DB接続します
    session_start();
    require_once('funcs.php');
    loginCheck();
    $id = $_GET['id'];
    // 入力データの取得
    $todo = $_POST['todo'];
    $ref = $_POST['ref'];
    $next = $_POST['next'];
    ?>

    <div class="card">
        <span class="card__title">次の25分で何をする？</span>
        <p class="card__content">こちらで登録いたします。</p>
        <div class="card__form">
            <p>todo:<?= $todo ?></P>
            <p>振り返り:<?= $ref ?></P>
            <p>次回:<?= $next ?></P>
        </div>
        <!-- hiddenで隠してformを作成し、formの内容はvalueで入力する -->
        <form action="insert.php" method="post">
            <input type="hidden" name="todo" value="<?= $todo ?>">
            <input type="hidden" name="ref" value="<?= $ref ?>">
            <input type="hidden" name="next" value="<?= $next ?>">
            <input type="submit" class="submit" value="送信">
        </form>
        <p class="submit"><a href="../index.php">修正する</a></p>
    </div>

</body>

</html>