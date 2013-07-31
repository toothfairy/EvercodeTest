<?php
class Model_Category extends Model
{
    public function get_data()
    {		
		// определяем id
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		
		$cleanurl = $routes[2];
		$category = $this -> base -> getCategoryUrl($cleanurl);
		if (!$category) 
		{	
			Route::ErrorPage404();
		}
		
		$posts = $this -> base -> getPostsByCat($category['id']);
		$data['title'] = $category['name'];
		$data['name'] = $category['name'];
		$data['posts'] = $posts;
		return $data;
	}
	public function get_categories()
	{
		$categories = $this -> base -> getAllCategories();
		$data['categories'] = $categories;
		$data['title'] = "Все категории";
		return $data;
	}
	public function add()
	{	
		if (!isset($_SESSION['userid']))
		{
			Route::ErrorAccess();
		}
		
		$data['name'] = isset($_POST['name']) ? $_POST['name'] : NULL;
		if ($data['name'])
		{
			$data['cleanurl'] = translit($data['name']);
			if ($this -> base -> isCategoryUrl($data['cleanurl']))
			{
				// если по такому url уже есть категория, то приписываем _2
				// при возможности вложенных категорий эту проверку нужно будет не забыть изменить
				$data['cleanurl'] = $data['cleanurl'].'_2';
			}
			$this -> base -> addCategory($data['name'],$data['cleanurl']);
			$data['message'] = "Категория добавлена";
		}
		else
		{
			$data['message'] = "Заполните форму";
		}		
		$data['title'] = "Добавить категорию";
		return $data;
	}
}	