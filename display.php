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
  <h3>現在の日時は<?php echo date('Y/m/d/H:i'); ?>です。</h3>
  <p></p>
  <br>
  <?php
  $user = $_POST['user'];
  $content1 = $_POST['content1'];
  if ( $user == "" || $content1 == "" ){
    echo '<h3 style="color: red">', "全ての項目を入力してください", '</h3>';
  }
  else{
    echo '<article>', $user,"さんが入力した内容は",$content1,"です!", '</article>';
    echo '<br>';
  }

  //ファイル処理
  //tmp_nameはサーバーに一時保存されたファイル名
  $tempfile = $_FILES['file_upload']['tmp_name'];
  $filename = $_FILES['file_upload']['name']; //nameは本来のファイル名

  if ( is_uploaded_file($tempfile) ){
    //アップロード出来るファイル拡張子を画像ファイルに限定
    if ( $_FILES['file_upload']['type'] == 'image/jpeg' || $_FILES['file_upload']['type'] == 'image/jpg' || $_FILES['file_upload']['type'] == 'image/png' ){
      if ( move_uploaded_file($tempfile,$filename) ){
        echo $filename."をアップロードしました。";
        echo '<br>';
        echo "ファイルの種類は".$_FILES['file_upload']['type']."です。";

        echo '<br>';
        //画像をuploadディレクトリに移動
        if ( copy($filename, 'upload/'.$filename) ){
          echo 'アップロードされた画像をディレクトリuploadにコピーしました。';
        }
        else{
          echo 'コピーに失敗しました。';
        }
        echo '<br>';
        echo "<img src=\"./upload/$filename\" width = 500px height = 500px>";
      }
      else{
        echo "ファイルをアップロード出来ませんでした。";
      }
      echo '<br>';
    }
    else if ( $_FILES['file_upload']['type'] == 'application/pdf' ){
      if ( move_uploaded_file($tempfile,$filename) ){
        echo $filename."をアップロードしました。";
        echo '<br>';
        echo "ファイルの種類は".$_FILES['file_upload']['type']."です。";

        echo '<br>';
        //画像をuploadディレクトリに移動
        if ( copy($filename, 'upload/'.$filename) ){
          echo 'アップロードされたファイルをディレクトリuploadにコピーしました。';
        }
        else{
          echo 'コピーに失敗しました。';
        }
        echo '<br>';
        $filepath = 'upload/'.$filename;
        echo "<a href=\"./upload/$filename\">".$filename."</a>";
        echo '<br>';
      }
    }
    else{
      echo "対応したファイルをアップロードしてください。";
      echo '<br>';
    }
  }
  else{
    echo $user."さんはファイルをアップロードしませんでした。";
    echo '<br>';
  }
  ?>
  <a href="http://localhost/maki_php/sample.php">ホーム画面に戻る</a>
</body>
