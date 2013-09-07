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
        if (strpos($url, '?'))
			{
				 $url = substr($url, 0, strpos($url, '?'));
			}
		$routes = explode('/', $url);
		if (!is_numeric($routes[2])) 
		{
			Route::ErrorPage404();
		}
		$id = $routes[2];
		
		$newName = isset($_POST['name']) ? $_POST['name'] : NULL;
		$newText = isset($_POST['text']) ? $_POST['text'] : NULL;
		$newCategory = isset($_POST['category']) ? $_POST['category'] : NULL;		
		
		$post = $this -> base -> getOnePostId($id);
		if (!$post)
		{
			Route::ErrorPage404();
		}
		
		// подстановка в форму новых значений, если они есть
		if ($newName)
		{
			$post['name'] = $newName;
		}
		if ($newText)
		{
			$post['content'] = $newText;
		}
		if ($newCategory)
		{
			$post['category_id'] = $newCategory;
		}
		
		$post['content'] = str_replace("<br>", "\r\n", $post['content']);
		$data['post'] = $post;
		
		if ($newName == NULL and $newText == NULL)
		{
			//если все пустые, значит только загрузилась страница редактирования. Способ неверный, но пока так
			$data['message'] = "Редактировать запись";
		}
		elseif ($newName == NULL or $newText == NULL)
		{
			$data['message'] = "Неправильно заполнена форма!";		
		}
		else
		{
			$this -> base -> updatePost($id,$newName,$newText, $newCategory);
			$data['message'] = "Запись отредактирована";
		}
		
		$data['categories'] = $this -> base -> getAllCategories();
		$data['title'] = "Редактировать ".$post['name'];
		return $data;
    }
}