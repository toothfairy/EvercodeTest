<?php
require_once "/tmpl/functions.php";

$base = Connect();

PrintHeader("Добавить запись");


$name = 	isset($_POST['name']) ? $_POST['name'] : '';
$date = 	isset($_POST['date']) ? $_POST['date'] : '';
$text = 	isset($_POST['text']) ? $_POST['text'] : '';

if ($name == '' and $date == '' and $text == '')
{
?>
<form action="/add.php" method="post" class="formAdd">
	<p>Введите название<br>
		<input type="text" name="name">
	</p>
	<p>Введите дату<br>
		<input type="text" name="date">
	</p>
	<p>	
		Введите текст<br>
		<textarea rows="8" name="text"></textarea>
	</p>
	<p><input type="submit" class="button" autofocus></p>
</form>
<?php
}
elseif ($name == '' or $date == '' or $text == '')
{
	echo "<p><strong>Форма заполнена неверно</strong></p>";
	?>
<form action="/add.php" method="post" class="formAdd">
	<p>Введите название<br>
		<input type="text" name="name" value="<?=$name?>">
	</p>
	<p>Введите дату<br>
		<input type="text" name="date" value="<?=$date?>">
	</p>
	<p>	
		Введите текст<br>
		<textarea rows="8" name="text"><?=$text?></textarea>
	</p>
	<p><input type="submit" class="button" autofocus></p>
</form>
<?php
}
else
{
	$sql = 'INSERT INTO posts (name, content, date) VALUES (:name,:text,:date)';
	$sql = $base -> prepare($sql);
	$sql -> bindParam (':name',$name,PDO::PARAM_STR);
	$sql -> bindParam (':text',$text,PDO::PARAM_STR);
	$sql -> bindParam (':date',$date,PDO::PARAM_STR);
	$sql -> execute();
	echo "<p>Запись добавлена!</p>";
	?>
	<a href="/">На главную</a>
	<?php
}

?>


<?php
/*$sql = 'SELECT id, name, content, date FROM posts ORDER BY id';
foreach ($base -> query($sql) as $row) {
        ?>
			<div class="posts"><a href="/post.php?id=<?=$row['id']?>"><?=$row['name']?></a></div>
		<?php
    }
	*/
PrintFooter();
?>