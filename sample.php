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
  .button1 {
    width: 100px;
    font-size: 1rem;
    color: #FFFFFF;
    text-align: center;
    /*inline-blockによってblockレイアウトかつ横並び表示可能*/
    display: inline-block;
    margin: 0 auto;
    padding: 10px 0 10px;
    background: #6BCBF6;
    border-radius: 15px;
  }
  .container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  .url {
    margin: 10px;
    flex-grow: 1;
    height: 20%;
    border: solid 1px black;
    background-color: orange;
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
  <p style="text-align: center;">メール送信したい方向け(メールサーバーが構築されていないため送信は不可)</p>
  <p></p>
  <div>
    <form action="http://localhost/maki_php/mails.php" method="post">
      <p>相手のメールアドレス</p><input type="text" name="to">
      <p>自分のメールアドレス</p><input type="text" name="from">
      <p>タイトル</p><input type="text" name="title">
      <p>本文</p><textarea name="content" cols="40" rows="5"></textarea>
      <p><input type="submit" name="send" value="送信"></p>
    </form>
  </div>
  <p>検索したいログインIDを入力してください。</p>
  <form action="http://localhost/maki_php/search.php" method="post">
    <p><input type="text" name="search"></p>
    <p><input type="submit" name="send" value="検索"></p>
  </form>
  <p></p>
  <input type="button" class="button1" value="alert" onclick="input_alert()">
  <script type="text/javascript">
  function input_alert(){
    var name = window.prompt("名前を入力してください");
    if ( name == "" || name == null ){
      window.alert("名前を入力してください");
    }
    else{
      window.alert("ようこそ," + name + "さん!");
    }
  }
  </script>
  <p>各種リンク先(display:flex;の学習)</p>
  <div class="container">
    <div class="url"><a href="https://www.google.com/">Google</a></div>
    <div class="url"><a href="https://www.yahoo.co.jp/"> Yahoo!Japan</a></div>
    <div class="url"><a href="https://ntp.msn.com/edge/ntp?locale=ja">Microsoft edge</a></div>
    <div class="url"><a href="https://www.youtube.com/?gl=JP&hl=ja">YouTube</a></div>
    <!--<div class="url"><a href="https://www.jma.go.jp/jma/index.html">気象庁</a></div>-->
  </div>
  <br>
  <input type="button" class="button1" value="文字色変更1" onclick="change_color('red')">
  <input type="button" class="button1" value="文字色変更2" onclick="change_color('blue')">
  <input type="button" class="button1" value="初期設定の色" onclick="change_color('black')">
  <script type="text/javascript">
  function change_color(newColor){
    var element = document.getElementById('color');
    element.style.color = newColor;
  }
  </script>
  <p></p>
  <form action="http://localhost/maki_php/display.php" enctype="multipart/form-data" method="post">
    <input type="text" name="user" style="width: 20%;" placeholder="あなたの名前を入力してください">
    <p></p>
    <textarea name="content1" cols="40" rows="5" style="width: 50%;" placeholder="他のファイルに送信したい文章を入力してください"></textarea>
    <p>アップロード可能ファイルは画像ファイル、PDFファイルのみです</p>
    <p><input type="file" name="file_upload"></p>
    <input type="submit" name="send" value="送信">
  </form>
  <p></p>
  <a href="http://localhost/maki_php/login.php">ログイン画面に戻る</a>
</body>
</html>
