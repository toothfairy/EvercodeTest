<h1><?=$data['name']?></h1>
<p>
<?php
    foreach($data['posts'] as $row)
    {
		echo "<div class=\"posts\"><a href=\"/post/".$row['cleanurl']."\">".$row['name']."</a></div>";
    }
?>
</p>	