<?php
require_once "/tmpl/functions.php";

$base = Connect();

$auth = false;
if (!isset($_SERVER['PHP_AUTH_USER'])) 
{
	header('Content-Type: text/html; charset=utf-8');
	header('WWW-Authenticate: Basic realm="Authorization"');
    header('HTTP/1.0 401 Unauthorized');
    $auth = false;
} else {
	$login = getLogin();
	$pas = getPass();	
	if ($login == $_SERVER['PHP_AUTH_USER'] and $pas == $_SERVER['PHP_AUTH_PW'])
		$auth = true;
	else
		$auth = false;
}
PrintHeader("Добавить запись");

if ($auth)
{
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$date = isset($_POST['date']) ? $_POST['date'] : '';
	$text = isset($_POST['text']) ? $_POST['text'] : '';

	if ($name == '' and $date == '' and $text == '')
	{
		PrintForm('formAdd');
	}
	elseif ($name == '' or $date == '' or $text == '')
	{
		echo "<p><strong>Форма заполнена неверно</strong></p>";
		$params = array('name' => $name, 'date' => $date, 'content' => $text);
		PrintForm('formAdd',$params);
	}
	else
	{
		$sql = 'INSERT INTO posts (name, content, date) VALUES (:name,:text,:date)';
		$sql = $base -> prepare($sql);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$sql -> bindParam (':text',$text,PDO::PARAM_STR);
		$sql -> bindParam (':date',$date,PDO::PARAM_STR);
		$sql -> execute();
		?>
		<p>Запись добавлена!</p>
		<a href="/">На главную</a>
		<?php
	}
}
else
{
	echo "<p><strong>Авторизируйтесь!</strong></p>";
}
PrintFooter();
?>