<?php
session_start();
require_once('funcs.php');// funcs.php ファイルをインクルード
loginCheck(); // loginCheck 関数を呼び出し
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポモドーロアプリ</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<header>
    <p class="link_title"><a href="form.php">入力</a></p>
    <p class="link_title"><a href="select.php">一覧表示</a></p>
    <p class="link_title"><a href="../index.php">使い方</a></p>
    <p class="link_title"><a href="logout.php">ログアウト</a></p>
    <!-- <p class="link_title"><a href="login.php">ログイン</a></p> -->
</header>

<body>
    <div class="card">
        <span class="card__title">次の25分で何をする？</span>
        <div class="card__form">
            <form action="form_confirm.php" method="post">

                <label for="todo">①todo</label>
                <input type="text" class="todo" name="todo" placeholder="何をする予定？"><br>
                <label for="ref">②振り返り</label>
                <input type="text" class="ref" name="ref" placeholder="振り返り"><br>
                <label for="next">③次からはこうしたい</label>
                <input type="text" class="next" name="next" placeholder="次はこうする"><br>
                <input type="submit" class="submit" value="確認する">
            </form>
        </div>
    </div>
</body>

</html>