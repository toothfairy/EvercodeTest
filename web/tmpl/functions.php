<?php
function PrintHeader($title)
{
	?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title?> - Мой блог</title>
<link href="/tmpl/style.css" type="text/css" rel="stylesheet">
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
?>