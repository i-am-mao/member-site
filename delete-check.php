<?php
	//delete-form.phpから値を受け取る
	$username = $_POST['username'];
	$pass = $_POST['pass'];	
	
	//データベース接続
	$dsn = 'mysql:dbname=データベース名;host=ホスト名';
	$user = 'ユーザー名';
	$password = 'パスワード';
		$dbh = new PDO($dsn, $user, $password);
		if ($dbh == null){
			print('接続に失敗しました。<br>');
		}else{ 
		} $dbh->query('SET NAMES UTF-8');
		
	//ユーザーネームとパスワードが合っているかチェック
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

	//一致していた場合としてなかった場合で分岐
	if($username == $usernamecheck && $pass == $passcheck){   
			session_start();
			session_regenerate_id(true);
			$_SESSION['login']=1;
			$_SESSION['username']=$username;
?>
	<!-- 一致していた人にはアカウント削除の最終確認 -->
	<form action="delete-comp.php" method="post">
		<input type="hidden" name="username" value="<?php print $username; ?>">
		<input type="hidden" name="pass" value="<?php print $pass; ?>">
		<input type="submit" value="削除します。本当に宜しいですか？">	
	</form>
	<a href="index.php">アカウント削除を取り消す</a>

<?php
	} else { ?>
		<!-- 一致していなかった人には再度フォームを表示 -->
		<h2>パスワードをご確認ください</h2>
				<form action="delete-check.php" method="post">
					<div><?php session_start(); print $_SESSION["username"]; ?></div>
					<div>
						<input type="hidden" name="username" value="<?php print $_SESSION["username"]; ?>">
						<input type="password" name="pass"><input type="submit" name="submit" id="submit" value="アカウントを削除">
					</div>
				</form>
<?php
	}
	//データベース切断
	$dbh = null;
?>