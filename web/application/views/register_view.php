<?=$data['message']?><br>
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li>".$error."</li>";
		}
	}
?>
<form action="/register" method="post">
    <p>
		Логин:<br>
		<input type="text" name="login" value="<?=$data['login']?>">
	</p><p>
		Пароль:<br>
		<input type="password" name="password">
	</p><p>
		E-mail:<br>
		<input type="text" name="email"  value="<?=$data['email']?>">
	</p>
	<input type="submit" value="Зарегестрироваться">
	<input type="text" name="fl" value="true" hidden>
</form>