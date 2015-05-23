<?php
	//regi-^check.phpから値を受け取る
	$username = $_POST['username'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	
	//データベース接続
	$dsn = 'mysql:dbname=データベース名;host=ホスト名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	    $dbh = new PDO($dsn, $user, $password);
		if ($dbh == null){
	        print('接続に失敗しました。<br>');
	    }else{
	    }
	$dbh->query('SET NAMES UTF-8');
	
	//アカウント情報を新規塚
	$sql = 'INSERT INTO userinfo(username,mail,pass) VALUES ("'.$username.'","'.$mail.'","'.$pass.'")';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();   
	$dbh = null;
	
	//セッション開始してユーザーネームを取得できるようにする
	session_start();
	session_regenerate_id(true);
	$_SESSION['login']=1;
	$_SESSION['username']=$username;
	
	//登録完了メールなど送る場合はここに記述
	
	//ここに当力完了メーッセージを書いてもよし、トップにリダイレクトさせるもよし
	//下記はリダイレクトさせる場合
	//基本はhttp://～から入力
	header("Location: index.php");	
?>