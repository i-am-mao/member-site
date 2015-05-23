<?php
	//regi-form.phpから値を受け取る
	$username = $_POST['username'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	
	//データベース接続
	$dsn = 'mysql:dbname=データベース名;host=ホスト名';
	$user = 'ユーザーネーム';
	$password = 'パスワード';
	    $dbh = new PDO($dsn, $user, $password);
		if ($dbh == null){
	        print('接続に失敗しました。<br>');
	    }else{ print '';
	    } $dbh->query('SET NAMES UTF-8');
	
	//重複チェック
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
		$mailcheck = $rec['mail'];		
	}

?>

<h2>会員サイトデモ</h2>
<form action="http://demo.inka-it-solution.com/demo/member-site/new-regi/regi-comp/" method="post">
	<table id="member">
		<tr>
			<th>名前：</th>
			<td><?php 
					//ユーザーネームが既に登録されていたらここではじく
					if($username == $usernamecheck){   
					print '入力されたＩＤは既に使われています'; }
					else{ print $username;} ?></td>
		</tr>
		<tr>
			<th>メールアドレス：</th>
			<td><?php if($mail == $mailcheck){  
					//メールも重複しないようにはじく 
					print '入力されたメールアドレスは既に使われています'; }
					else{ print $mail;} ?></td>
		</tr>
		<tr>
			<th>パスワード：</th>
			<td><?php print $pass; ?></td>
		</tr>
		<tr>
			<th colspan="2">
				<input type="hidden" name="username" value="<?php print $username; ?>">
				<input type="hidden" name="mail" value="<?php print $mail; ?>">
				<input type="hidden" name="pass" value="<?php print $pass; ?>">
				<?php if($username ==$usercheck || $mail ==$mailcheck){   ?>
					<!-- ユーザーネームもしくはパスワードが重複していたら戻るボタンのみ表示 -->
					<INPUT type="button" value="戻る"  id="submit" onClick="history.back()">
				<?php } else { ?> 
					<!-- どちらも重複していなかったら先に進める -->
					<input type="submit" id="submit" value="送信">
				<?php }	?>
			</th>
		</tr>
</form>
		