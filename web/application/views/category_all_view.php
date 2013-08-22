<div class="editLink"><a href="/category/add">Добавить категорию</a></div>
<h1>Все категории</h1>
<ul>
<?php
foreach ($data['categories'] as $cat)
{
?>
	<li><a href="/category/<?=$cat['cleanurl']?>" title=""><?=$cat['name']?></a></li>
<?php
}
?>
</ul>