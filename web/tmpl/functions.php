<?php
function PrintHeader($title)
{	?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title?> - Мой блог</title>
<link href="/tmpl/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>	
<div id="wrapper">
	<div id="header">
		<div id="logo">Мой блог</div>
		<ul id="mainMenu">
			<li><a href="/" title="">Главная</a></li>
			<li><a href="/add.php" title="">Добавить запись</a></li>
			<li><a href="/edit.php" title="">Редактировать запись</a></li>
		</ul>
	</div>
	<div id="content">
	<?php
}
function PrintFooter()
{
?>
	</div>
	<div id="footer">
	
	</div>
</div>
</body>
</html>
<?php
}

function Connect()
{
$host = "evercodetest.dev";
$dbname = "evercodebase";
$user ="root";
$base = new PDO("mysql:host=$host;dbname=$dbname", $user); 
$base -> query("set names utf8");
return $base;
}

function PrintForm($name, $params = '')
{
	if ($name == 'formEdit')
	{
	?>
		<form action="/edit.php?id=<?=$params['id']?>" method="post" class="formEdit">
			<p>Введите название<br>
				<input type="text" name="name" value="<?=$params['name']?>">
			</p>
			<p>Введите дату<br>
				<input type="text" name="date" value="<?=$params['date']?>">
			</p>
			<p>	
				Введите текст<br>
				<textarea rows="8" name="text"><?=$params['content']?></textarea>
			</p>
			<p><input type="submit" class="button" autofocus></p>
		</form>
	<?php
	}
	if ($name == 'formId')
	{
	?>
		<form action="/edit.php" method="get" class="formID">
			<p>Введите id записи для редактирования<br>
				<input type="text" name="id" value="">
			</p>
			<p><input type="submit" class="button" autofocus></p>
		</form>
	<?php
	}
	if ($name == 'formAdd')
	{
		if ($params == '')
		{
			$params['name'] = '';
			$params['date'] = '';
			$params['content'] = '';
		}
		?>
		<form action="/add.php" method="post" class="formAdd">
			<p>Введите название<br>
				<input type="text" name="name" value="<?=$params['name']?>">
			</p>
			<p>Введите дату<br>
				<input type="text" name="date" value="<?=$params['date']?>">
			</p>
			<p>	
				Введите текст<br>
				<textarea rows="8" name="text"><?=$params['content']?></textarea>
			</p>
			<p><input type="submit" class="button" autofocus></p>
		</form>
		<?php
	}
}

function getNumPosts()
{
	return 5;
}
function getLogin()
{
	return 'admin';
}
function getPass()
{
	return 'qwerty';
}

?>

