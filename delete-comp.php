<?php
	//delete-check.phpから値を受け取る
	$username = $_POST['username'];
	$pass = $_POST['pass'];	
	
	//データベース接続
	$dsn = 'mysql:dbname=データベース名;host=ホスト名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	    $dbh = new PDO($dsn, $user, $password);
		if ($dbh == null){
	        print('接続に失敗しました。<br>');
	    }
	
	//テーブルのidを取得
	$sql = 'SELECT * FROM userinfo WHERE username=?';
	$stmt = $dbh->prepare($sql);
	$date[]=$username;
	$stmt->execute($date);
	while(1)
	{
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false)
		{
		break;
		}
		$id = $rec['id'];
	}

	//アカウントを削除
	$sql = "delete from userinfo where id=$id";
	if(!$res=mysql_query($sql)){
	exit;
	} 
	
	//セッションも削除してトップに戻っても名前が表示されないようにする
	session_start();
	$_SESSION["username"]="";
	
	$_SESSION=array();
	session_destroy();	
?>
<h2>アカウントを削除しました</h2>
<a href="index.php">トップに戻る</a>