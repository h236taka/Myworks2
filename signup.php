<!DOCTYPE html>
<html>
<head>
  <style>
  body {
    background-color: skyblue;
    text-align: center;
  }
  </style>
</head>
<body>
  <header>新規登録ページ</header>
  <p>ログインID</p>
  <form action="authorized.php" method="post">
    <input type="text" name="username" size=30% placeholder="ログインIDを入力してください">
    <p>パスワード</p>
    <input type="password" name="password" size=30% placeholder="パスワード(10文字以下)">
    <p></p>
    <select name="login_info">
      <option value="" selected>ログインID公開/非公開</option>
      <option value="1">ログインIDを公開する</option>
      <option value="0">ログインIDを公開しない</option>
    </select>
    <p></p>
    <input type="submit" value="登録">
  </form>
  <p><a href="http://localhost/maki_php/login.php">ログインページに戻る</a></p>
</body>
</html>
