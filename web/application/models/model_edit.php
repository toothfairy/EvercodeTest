<?php
class Model_Edit extends Model
{
    public function get_data()
    {
		// определяем id
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		if (is_numeric($routes[2])) {
			$id = $routes[2];
		}
		else {
			Route::ErrorPage404();
		}
		
		$newName = isset($_POST['name']) ? $_POST['name'] : NULL;
		$newDate = isset($_POST['date']) ? $_POST['date'] : NULL;
		$newText = isset($_POST['text']) ? $_POST['text'] : NULL;
				
		$sql = 'SELECT id, name, content, date FROM posts WHERE id=:id';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> execute();
		$post = $sql -> fetch();
		
		$data['title'] = "Редактировать ".$post['name'];
		
		// подстановка в форму новых значений, если они есть
		if ($newName)
		{
			$post['name'] = $newName;
		}
		if ($newDate)
		{
			$post['date'] = $newDate;
		}
		if ($newText)
		{
			$post['content'] = $newText;
		}
		
		$post['content'] = str_replace("<br>", "\r\n", $post['content']);
		$data['post'] = $post;
		
		if ($newDate == NULL and $newName == NULL and $newText == NULL)
		{
			//если все пустые, значит только загрузилась страница редактирования. Способ неверный, но пока так
			$data['message'] = "Редактировать запись";
		}
		elseif ($newDate == NULL or $newName == NULL or $newText == NULL)
		{
			$data['message'] = "Неправильно заполнена форма!";		
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
			$sql = $this -> base -> prepare($sql);
			$sql -> bindParam (':id',$id,PDO::PARAM_INT);
			$sql -> bindParam (':name',$newName,PDO::PARAM_STR);
			$newText = str_replace("\r\n", "<br>", $newText);
			$sql -> bindParam (':content',$newText,PDO::PARAM_STR);
			$sql -> bindParam (':date',$newDate,PDO::PARAM_STR);
			$bl = $sql -> execute();
				
			$data['message'] = "Запись отредактирована";
		}
		return $data;
    }
}