<?php
require_once "/tmpl/functions.php";

$base = Connect();

PrintHeader("Главная страница");

$sql = 'SELECT id, name, content, date FROM posts ORDER BY id DESC';
$sql = $base -> prepare($sql);
$sql -> execute();
$post = $sql -> fetch();
while ($post)
{
	?>
	<div class="posts"><a href="/post.php?id=<?=$post['id']?>"><?=$post['name']?></a></div>
	<?php
	$post = $sql -> fetch();
}
PrintFooter();
?>