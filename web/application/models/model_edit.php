<?php
class Model_Edit extends Model
{
    public function get_data()
    {
		if (!isset($_SESSION['userid']))
		{
			Route::ErrorAccess();
		}
		// определяем id
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		if (!is_numeric($routes[2])) 
		{
			Route::ErrorPage404();
		}
		$id = $routes[2];
		
		$newName = isset($_POST['name']) ? $_POST['name'] : NULL;
		$newDate = isset($_POST['date']) ? $_POST['date'] : NULL;
		$newText = isset($_POST['text']) ? $_POST['text'] : NULL;
				
		$post = $this -> base -> getOnePostId($id);
		if (!$post)
		{
			Route::ErrorPage404();
		}
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
			$this -> base -> updatePost($id,$newName,$newText,$newDate);
			$data['message'] = "Запись отредактирована";
		}
		return $data;
    }
}