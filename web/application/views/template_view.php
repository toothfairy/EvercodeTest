<!DOCTYPE html>
<html>
<head>
<title><?=$data['title']?> - Мой блог</title>
<link href="/css/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">Мой блог</div>
		<ul id="mainMenu">
			<li><a href="/" title="">Главная</a></li>
			<li><a href="/category" title="">Категории</a></li>
			<li><a href="/add" title="">Добавить запись</a></li>
			<li><a href="/login" title="">Вход</a></li>
			<li><a href="/register">Регистрация</a>
			<li><a href="/exit" title="">Выход</a></li>
		</ul>
	</div>
	<div id="content">
    <?php include 'application/views/'.$content_view; ?>	</div>
	<div id="footer">
	
	</div>
</div>
</body>
</html>