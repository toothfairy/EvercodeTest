<?php
require_once "/tmpl/functions.php";

$conf = new conf;
$base = $conf->connect();
$tmpl = new templates;

$page = isset($_GET['page']) ? $_GET['page'] : '1';
$tmpl->printHeader("Главная страница");

if (is_numeric($page))
{
	$sql = 'SELECT id, name, content, date FROM posts ORDER BY id DESC';
	$sql = $base -> prepare($sql);
	$sql -> execute();

	$post = $sql -> fetchAll();

	$n = count($post);
	$postsOnPage = $conf->getNumPosts();
	$numPages = ceil($n/$postsOnPage);
	$postStart = $page*$postsOnPage - $postsOnPage;
	$postEnd = $page*$postsOnPage - 1;
	
	if ($postEnd >= $n)
		$postEnd = $n - 1;	
	if ($page > $numPages)
	{
		echo "<p><strong>Ошибка 404! Страница не найдена</strong></p>";
	}
	else
	{
		for ($i = $postStart; $i <= $postEnd; $i++)
		{
			?>		
			<div class="posts"><a href="/post/<?=$post[$i]['id']?>"><?=$post[$i]['name']?></a></div>
			<?php
		}
	}
	echo "Страницы: ";

	for ($i = 1; $i <= $numPages; $i++)
	{	
		if ($page == $i)
			echo "<b>".$i."</b> ";
		else
			echo "<a href=\"".$i."\">".$i."</a> ";
	}
}
else
{
	echo "<p><strong>Ошибка! Номер страницы некорректен</strong></p>";
}
$tmpl->printFooter();
?>