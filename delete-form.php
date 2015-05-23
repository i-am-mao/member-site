<h2>アカウントを削除します</h2>

<form action="delete-check.php" method="post">
	<table id="member">
		<tr>
			<th>ユーザーネーム：</th>
			<td><?php session_start(); print $_SESSION["username"]; ?></td>
		</tr>
		<tr>
			<th>パスワード：</th>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<th colspan="2">
				<input type="hidden" name="username" value="<?php print $_SESSION["username"]; ?>">
				<input type="submit" id="submit" value="アカウントを削除">
			</th>
		</tr>
	</table>
</form>
