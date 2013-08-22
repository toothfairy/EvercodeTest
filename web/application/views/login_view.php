<?php
	if (isset($data['message']))
	{
			echo "<p>".$data['message']."</p>";
	}
	if (isset($data['error']))
	{
			echo "<p>".$data['error']."</p>";
	}
?>
<?php
if ($data['message'] != "Вход выполнен" and $data['message'] != "Вы уже авторизованы") {
?>
<form action="/login" method="post">
    <p>
		Логин:<br>
		<input type="text" name="login" value="<?=$data['login']?>">
	</p><p>
		Пароль:<br>
		<input type="password" name="password">
	</p>
	<input type="submit" value="Вход">
	<input type="text" name="fl" value="true" hidden>
</form>
<?php } ?>