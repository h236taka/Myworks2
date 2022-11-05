<?php
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

/*$query = "DELETE FROM login";
if ( mysqli_query($link, $query) ){
  echo "データのDELETEに成功しました";
  echo '<br>';
}*/

//signup.phpの情報
$username = $_POST['username'];
$password = $_POST['password'];
$login_info = $_POST['login_info'];

if ( $username == "" || $password == "" || $login_info == "" ){
  echo "全ての項目を入力してください。";
  echo '<br>';
  echo '<a href="http://localhost/maki_php/signup.php">'."戻る".'</a>';
  mysqli_close($link);
  exit;
}

$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
if ( !mysqli_query($link,$query) ){
  error_log($mysqli->error);
  mysqli_close($link);
	exit;
}

$res = mysqli_query($link,$query);

if (mysqli_num_rows($res) == 0) {
	$query = "INSERT INTO login (username,password) values ('$username','$password');";
}
else{
	echo "ユーザー名とパスワードの組合せが既に使用されています";
  echo '<br>';
  echo '<a href="http://localhost/maki_php/signup.php">'."戻る".'</a>';
  mysqli_close($link);
  exit;
}

//insert文を実行
$query = "INSERT INTO login (username,password,open) values ('$username','$password', '$login_info');";

if ( mysqli_query($link, $query) ){
  echo "INSERTに成功しました";
  echo '<br>';
}
else{
  echo "INSERTに失敗しました";
  echo '<br>';
}

// userテーブルの全てのデータを取得する
$query = "SELECT id, username, password, open FROM login;";

// クエリを実行します。
if ( $result = mysqli_query($link, $query) ) {
  echo "SELECT に成功しました。";
  echo '<br>';
  foreach ($result as $row) {
    echo "IDNo.".$row['id'].':'.$row['username'].':'.$row['password']."ログインID公開?".$row['open'];
    echo '<br>';
  }
}

echo '<a href="http://localhost/maki_php/login.php">'."ログイン画面に戻る".'</a>';

mysqli_close($link);
?>
