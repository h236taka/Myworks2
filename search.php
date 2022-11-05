<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
  <title>Sampleサイト</title>
  <style>
  header {
    text-align: center;
    color: grey;
    background-color: black;
  }
  h3 {
    text-align: center;
    color: lime;
    line-height: 0;
    background-color: grey;
  }
  div {
    text-align: center;
  }
  body {
    text-align: center;
    background: radial-gradient(lightblue,lightyellow);
  }
  </style>
</head>
<body id="color">
  <?php date_default_timezone_set('Asia/Tokyo'); ?>
  <header>このサイトはHTML/CSS及びJavaScript、PHPの自学のために作成しました</header>
  <header>様々な機能を学習のために実装していきます</header>
  <?php
  // セッションの有効期限を8分に設定
  session_set_cookie_params(60 * 8);

  // セッション管理開始
  session_start();

  if ( !isset($_SESSION['count']) ) {
    // キー'count'が登録されていなければ、1を設定
    $_SESSION['count'] = 1;
  }
  else {
    //  キー'count'が登録されていれば、その値をインクリメント
    $_SESSION['count']++;
  }

  echo '<h3>'.$_SESSION['count']."回目の訪問です。".'</h3>';
  ?>
  <h3>現在の更新前の日時は<?php echo date('Y/m/d/H:i'); ?>です。</h3>
  <h4>現在のリアルタイムの日時は<p id="now"></p>です。</h4>
  <script type="text/javascript">
  //setInterval…一定時間ごとに特定の処理を繰り返す
  //querySelector() id,class属性を何でも取得
  //日本語のブラウザ環境であれば、数値が格納された変数に.toLocaleString()と記述するだけでカンマ区切りされた文字列に変換
  setInterval(()=>{
    document.querySelector('#now').textContent = new Date().toLocaleString();
  }, 100);
  </script>
  <?php
  $search = $_POST['search'];
  if ( $search == "" ){
    echo '<h3 style="color: red">', "全ての項目を入力してください", '</h3>';
    echo '<br>';
    echo '<a href="http://localhost/maki_php/sample.php">'."戻る".'</a>';
  }

  $host = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'logindb';
  $link = mysqli_connect($host,$username,$password,$dbname);

  if ( mysqli_connect_errno() ){
    die("データベースに接続不可:".mysqli_connect_error() . "\n");
  }
  else {
    echo "データベースの接続に成功しました。";
    echo '<br>';
  }

  $query = "SELECT * FROM login WHERE username = '$search' AND open = 1";
  if ( !mysqli_query($link,$query) ){
    error_log($mysqli->error);
    mysqli_close($link);
  	exit;
  }

  $res = mysqli_query($link,$query);

  if ( mysqli_num_rows($res) == 0 ) {
    echo '<h3 style="color: red">', "該当するIDが見つかりませんでした。", '</h3>';
    echo '<a href="http://localhost/maki_php/sample.php">'."戻る".'</a>';
    mysqli_close($link);
    exit;
  }
  else{
  	echo '<h3 style="color: red">', "該当するIDが見つかりました。", '</h3>';
    echo '<br>';
    echo '<a href="http://localhost/maki_php/sample.php">'."戻る".'</a>';
    mysqli_close($link);
    exit;
  }
  ?>
</body>
