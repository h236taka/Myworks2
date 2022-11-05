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

//login.phpの情報
$username = $_POST['username'];
$password = $_POST['password'];

if ( $username == "" || $password == "" ){
  echo "全ての項目を入力してください。";
  echo '<br>';
  echo '<a href="http://localhost/maki_php/login.php">'."戻る".'</a>';
  exit;
}

$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
if ( !mysqli_query($link,$query) ){
  error_log($mysqli->error);
	exit;
}

$res = mysqli_query($link,$query);

if (mysqli_num_rows($res) == 0) {
	$query = "INSERT INTO login (username,password) values ('$username','$password');";
  echo "ログイン認証に失敗しました。";
  echo '<br>';
  echo '<a href="http://localhost/maki_php/login.php">'."戻る".'</a>';
}
else{
	echo "ログイン認証に成功しました!";
  echo '<br>';
  echo 'ようこそ'.$username.'さん!';
  echo '<br>';
  header('location: http://localhost/maki_php/sample.php');
  exit;
}
