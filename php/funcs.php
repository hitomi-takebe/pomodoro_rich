<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//フォームにJSでいたずらされないため、文字列として表示する
function h($stg){
  return htmlspecialchars($stg, ENT_QUOTES);
}

//db接続
function db_conn()
{
  try {
    //ローカルのデータベースにアクセスするための必要な情報を変数に渡す
    $db_name = 'gs_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    return $pdo;
  } catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
  }
}

//SQLエラー
function sql_error($stmt)
{
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
  header('Location: ' . $file_name);
  exit();
}


// ログインチェク処理 loginCheck()
function loginCheck()
{
  if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    //ログインを経由していない場合
    exit('LOGIN ERROR');
  }

  session_regenerate_id(true);
  $_SESSION['chk_ssid'] = session_id();
}

