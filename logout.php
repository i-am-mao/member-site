<?php
	//セッションを削除
	session_start();
	$_SESSION["username"]="";

	$_SESSION=array();
	session_destroy();

	//ここに「ログアウトしました」の文章とか、リダイレクトさせたりとか
	//下記はリダイレクトさせる場合
	//基本http://～から記述
	header("Location: index.php");
?>