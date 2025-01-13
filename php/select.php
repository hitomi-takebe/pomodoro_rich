<?php
//1.データ登録

session_start();
require_once('funcs.php');
// functionにlogincheckの機能を持っていく
loginCheck();


//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM pomodoro;');
$status = $stmt->execute();

//３．データ表示
$view = '';
$sakuzyo = '';

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td>';
        $view .= '<a href="detail.php?id=' . $result['id'] .  '">' . $result['id'] . '</a>';
        $view .= '</td>';
        $view .= '<td> ' . $result['date'] . '</td><td>' . $result['todo'] . '</td><td>' . $result['ref'] . '</td><td>' . $result['next'] . '</td>';
        if ($_SESSION['kanri_flg'] === 1) {
            $view .= '<td>';
            $view .= '<a href="delete.php?id=' . $result['id'] .  '">';
            $view .= '[削除]';
            $view .= '</a>';
            $view .= '</td>';
        }
        $view .= '</tr>';
    }
}

//管理者ユーザーのみ削除列を追加
if ($_SESSION['kanri_flg'] === 1) {
    $sakuzyo .= '<th>削除</th>';
    // $sakuzyo .= '削除';
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!-- Head[Start] -->

    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <!-- テーブルのヘッダーを表示 -->
            <table border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>登録日</th>
                        <th>①todo</th>
                        <th>②振り返り</th>
                        <th>③次からはこうしたい</th>
                        <?= $sakuzyo ?>
                    </tr>
                </thead>
                <tbody>
                    <?= $view ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>