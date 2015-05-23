<?php
	//index.phpから値を受け取る
	$username = $_POST['username'];
	$pass = $_POST['pass'];	
	
	//データベース接続
	$dsn = 'mysql:dbname=データベース名;host=ホスト名';
	$user = 'ユーザーネーム';
	$password = 'パスワード';
		$dbh = new PDO($dsn, $user, $password);
		if ($dbh == null){
			print('接続に失敗しました。<br>');
		}else{ 
		} $dbh->query('SET NAMES UTF-8');
	
	//入力されたユーザーネームとパスワードが一致しているかチェック	
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
		$usernamecheck = $rec['username'];
		$passcheck = $rec['pass'];
	}

	//会員と非会員分岐部分
	if($username == $usernamecheck && $pass == $passcheck){   
			session_start();
			session_regenerate_id(true);
			$_SESSION['login']=1;
			$_SESSION['username']=$username;
		
			//一致していたのでマイページ等へリダイレクト
			//基本http://～から記述
			header("Location: index.php");

	} else { ?>
		<!-- ユーザーネームとパスが一致しなかった人はもう一度ログインフォームを表示 -->
		<h2>ログイン失敗</h2>
		<p>ユーザーネーム、パスワードのいずれかが間違えています</p>
				<form action="login.php" method="post" id="login">
					<input type="text" name="username" value="ユーザーネーム">
					<input type="password" name="pass" value="パスワード">
					<input type="submit" value="ログイン">
				</form>
<?php
	}
	//データベース切断
	$dbh = null;
?>