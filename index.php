<?php
	//ログインしてるか判別
	session_start();
	if(isset($_SESSION['login'])==false) {
?>
		<!-- 非会員に表示される部分 -->
		<h2>非会員トップぺージ</h3>
		<form action="login.php" method="post" id="login">
			<input type="text" name="username" value="ユーザーネーム" onFocus="cText(this)" onBlur="sText(this)">
			<input type="password" name="pass" value="パスワード" onFocus="cText(this)" onBlur="sText(this)">
			<input type="submit" value="ログイン">
		</form>
		<a href="regi-form.php">会員登録はコチラ</a>
		
<?php } else { ?>
		<!-- 会員に表示される部分 -->
		<h2>会員トップページ</h2>
		ようこそ、<?php print $_SESSION["username"]; ?>さん！<br />
		<a href="logout.php">ログアウト</a>、またはアカウントの削除は<a href="delete-comp.php">こちら</a>
<?php } ?>

<script>
function cText(obj){
if(obj.value==obj.defaultValue){
obj.value="";
obj.style.color="#000";
}
}

function sText(obj){
if(obj.value==""){
obj.value=obj.defaultValue;
obj.style.color="#999";
}
}
</script>		