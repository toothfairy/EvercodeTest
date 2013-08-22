<h1>Лента блога</h1>
<p>
<?php
    foreach($data['posts'] as $row)
    {
		echo "<div class=\"posts\"><a href=\"/post/".$row['cleanurl']."\">".$row['name']."</a></div>";
    }
	
    echo "Страницы: ";
	for ($i = 1; $i <= $data['maxpage']; $i++)
	{	
		if ($data['page'] == $i)
			echo "<b>".$i."</b> ";
		else
			echo "<a href=\"/main/".$i."\">".$i."</a> ";
	}
?>
</p>	