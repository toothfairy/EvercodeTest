<?php
require_once "/tmpl/functions.php";

$conf = new conf;
$base = $conf->connect();
$tmpl = new templates;

$auth = $conf->getAuth();

if ($auth)
{
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
			$tmpl->printHeader("Редактирование: ".$post['name']);
			?>
			<?php
			if ($newName == '' and $newDate == '' and $newText == '')
			{
				$tmpl->printFormEdit($id, $post['name'], $post['date'],$post['content']);
			}elseif ($newName == '' or $newDate == '' or $newText == '')
			{			
				echo "<p><strong>Вы заполнили не все поля</strong></p>";
				$params = array('name' => $newName, 'date' => $newDate, 'content' => $newText);
				PrintForm('formEdit',$params);		
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
				$newText = str_replace("\r\n", "<br>", $newText);
				$sql -> bindParam (':content',$newText,PDO::PARAM_STR);
				$sql -> bindParam (':date',$newDate,PDO::PARAM_STR);
				$bl = $sql -> execute();
				?>
				<p><strong>Запись отредактирована</strong>, <a href="/post/<?=$id?>">Перейти</a></p>
				<?php
			}
		}
		else
		{
			$tmpl->printHeader("404: Запись не найдена");
			?>
			<p><strong>404 Ошибка!<br>Запись для редактирования не найдена</strong></p>
			<?php
			$tmpl->printFormID();	
		}
		
	}
	else
	{
		$tmpl->printHeader("Редактировать");
		$tmpl->printFormID();
	}
}
else
{
	$tmpl->printHeader("Ошибка авторизации - Редактирование");
	echo "<p><strong>Авторизируйтесь!</strong></p>";
}
$tmpl->printFooter();
?>