<?php
require_once "/tmpl/functions.php";

$base = Connect();

$auth = getAuth();

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
		$text = str_replace("\r\n", "<br>", $text);
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