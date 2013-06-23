<?php
require_once "/tmpl/functions.php";

$base = Connect();

$id = isset($_GET['id']) ? $_GET['id'] : 'NULL';	// получаем id поста, который нужно редактировать

// данные для редактирования
$newName = isset($_POST['name']) ? $_POST['name'] : '';
$newDate = isset($_POST['date']) ? $_POST['date'] : '';
$newText = isset($_POST['text']) ? $_POST['text'] : '';

if ($id != 'NULL')
{
	$sql = 'SELECT id, name, content, date FROM posts WHERE id=:id';
	$sql = $base -> prepare($sql);
	$sql -> bindParam (':id',$id,PDO::PARAM_INT);
	$sql -> execute();
	$post = $sql -> fetch();
	
	if ($post)
	{	
		PrintHeader("Редактирование: ".$post['name']);
		?>
		<?php
		if ($newName == '' and $newDate == '' and $newText == '')
		{
			?>
			<form action="/edit.php?id=<?=$id?>" method="post" class="formEdit">
				<p>Введите название<br>
					<input type="text" name="name" value="<?=$post['name']?>">
				</p>
				<p>Введите дату<br>
					<input type="text" name="date" value="<?=$post['date']?>">
				</p>
				<p>	
					Введите текст<br>
					<textarea rows="8" name="text"><?=$post['content']?></textarea>
				</p>
				<p><input type="submit" class="button" autofocus></p>
			</form>
			<?php
		}elseif ($newName == '' or $newDate == '' or $newText == '')
		{
			?>
			<p><strong>Вы заполнили не все поля</strong></p>
			<form action="/edit.php?id=<?=$id?>" method="post" class="formEdit">
				<p>Введите название<br>
					<input type="text" name="name" value="<?=$newName?>">
				</p>
				<p>Введите дату<br>
					<input type="text" name="date" value="<?=$newDate?>">
				</p>
				<p>	
					Введите текст<br>
					<textarea rows="8" name="text"><?=$newText?></textarea>
				</p>
				<p><input type="submit" class="button" autofocus></p>
			</form>
			<?php
		
		}
		else
		{
			$sql ="UPDATE posts 
			SET 
				name = :name, 
				content = :content, 
				date = :date
			WHERE
				id = :id;";
			$sql = $base -> prepare($sql);
			$sql -> bindParam (':id',$id,PDO::PARAM_INT);
			$sql -> bindParam (':name',$newName,PDO::PARAM_STR);
			$sql -> bindParam (':content',$newText,PDO::PARAM_STR);
			$sql -> bindParam (':date',$newDate,PDO::PARAM_STR);
			$bl = $sql -> execute();
			?>
			<p><strong>Запись отредактирована</strong>, <a href="/post.php?id=<?=$id?>">Перейти</a></p>
			<?php
		}
	}
	else
	{
		PrintHeader("404: Запись не найдена");
		?>
		<p><strong>404 Ошибка!<br>Запись для редактирования не найдена</strong></p>
		<form action="/edit.php" method="get" class="formID">
			<p>Введите id записи для редактирования<br>
				<input type="text" name="id" value="">
			</p>
			<p><input type="submit" class="button" autofocus></p>
		</form>
		<?php
	}
	
}
else
{
	PrintHeader("Редактировать");
	?>
	<form action="/edit.php" method="get" class="formID">
		<p>Введите id записи для редактирования<br>
			<input type="text" name="id" value="">
		</p>
		<p><input type="submit" class="button" autofocus></p>
	</form>
	<?php
}

PrintFooter();
?>