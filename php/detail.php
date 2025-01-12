<?php

$id = $_GET['id'];
require_once('funcs.php');
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
    <title>データ登録</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .submit {
            max-width: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="submit"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <label>todo：<input type="text" name="todo" value="<?= $result['todo'] ?>"></label><br>
                <label>振り返り：<input type="text" name="ref" value="<?= $result['ref'] ?>"></label><br>
                <label>次回：<input type="text" name="next" value="<?= $result['next'] ?>"></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" class="submit" value="修正">
            </fieldset>
        </div>
    </form>
    <!-- タイマー -->
    <div id="timer">
        <p><span id="minutes"></span>分</p>
        <p><span id="seconds"></span>秒</p>
        <button id="startButton" class="submit">タイマー開始</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/timer.js"></script>
</body>

</html>