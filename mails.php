<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
  <?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $to = $_POST['to'];
  $from = $_POST['from'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  if ( $to == "" || $from == "" || $title == "" || $content = "" ){
    echo "全ての項目を入力してください";
  }

  if( mb_send_mail($to, $title, $content, 'From:{$from}') ){
    echo "メールを送信しました";
  }
  else {
    echo "メールの送信に失敗しました";
  }
  ?>
  <a href="http://localhost/maki_php/sample.php">前のページに戻る</a>
</body>
</html>
