<?php
require_once "/tmpl/functions.php";

$base = Connect();

PrintHeader("Главная страница");

$sql = 'SELECT id, name, content, date FROM posts ORDER BY id';
foreach ($base -> query($sql) as $row) {
        ?>
			<div class="posts"><a href="/post.php?id=<?=$row['id']?>"><?=$row['name']?></a></div>
		<?php
    }
	
PrintFooter();
?>