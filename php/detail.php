<?php
session_start();
require_once('funcs.php');
loginCheck();

$id = $_GET['id']; //?id~**を受け取る<div class="$pdo = db_conn();にはid情報を使うため上に持ってくる
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM pomodoro where id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>タイマー開始</title>
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
    <p class="link_title"><a href="form.php">入力</a></p>
    <p class="link_title"><a href="select.php">一覧表示</a></p>
    <p class="link_title"><a href="../index.php">使い方</a></p>
    <p class="link_title"><a href="logout.php">ログアウト</a></p>
    <!-- <p class="link_title"><a href="login.php">ログイン</a></p> -->
</header>

<body>
    <!-- タイマー -->
    <div id="timer">
        <h1>タイマー</h1>
        <p><span id="minutes"></span>分</p>
        <p><span id="seconds"></span>秒</p>
        <button id="startButton" class="submit">タイマー開始</button>
    </div>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <h1>入力</h1>
            <fieldset>
                <label>todo：<input type="text" name="todo" value="<?= $result['todo'] ?>"></label><br>
                <label>振り返り：<input type="text" name="ref" value="<?= $result['ref'] ?>"></label><br>
                <label>次回：<input type="text" name="next" value="<?= $result['next'] ?>"></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" class="submit" value="修正">
            </fieldset>
        </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/timer.js"></script>
</body>

</html>