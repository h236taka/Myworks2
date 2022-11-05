<!DOCTYPE html>
<html>
<head>
  <style>
  body {
    background-color: grey;
    text-align: center;
  }
  </style>
</head>
<body>
  <header>ログインページ</header>
  <p>ログインID</p>
  <form action="signin.php" method="post">
    <input type="text" name="username" size=30% placeholder="ログインIDを入力してください">
    <p>パスワード</p>
    <input type="password" name="password" size=30% placeholder="パスワード(10文字以下)">
    <p></p>
    <input type="submit" value="ログイン">
  </form>
  <p><a href="http://localhost/maki_php/signup.php">新規登録はこちら</a></p>
</body>
</html>
