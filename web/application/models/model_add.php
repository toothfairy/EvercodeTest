<?php
class Model_Add extends Model
{
    public function get_data()
    {
		if (!isset($_SESSION['userid']))
		{
			Route::ErrorAccess();
		}
		$data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
		$data['text'] = isset($_POST['text']) ? $_POST['text'] : '';
		$data['category_id'] = isset($_POST['category']) ? $_POST['category'] : '';
		$data['cleanurl'] = translit($data['name']); 
		$data['time'] = date("Y-m-d H:i:s");
		$data['author_login'] = $_SESSION['userlogin'];
		
		if ($data['name'] == '' and $data['text'] == '')
		{
			$data['message'] = "Добавить запись:";
		}
		elseif ($data['name'] == '' or $data['text'] == '')
		{
			$data['message'] = "Форма заполнена неверно";
		}
		else
		{
			if ($this -> base -> isPostUrl($data['cleanurl']))
			{
				// если по такому url уже есть пост, то приписываем _2
				$data['cleanurl'] = $data['cleanurl'].'_2';
			}
			$this -> base -> addPost($data['name'],$data['text'],$data['cleanurl'],$data['time'],$data['author_login'], $data['category_id']);
			$data['message'] = "Добавлена успешно!";
		}
		$data['categories'] = $this -> base -> getAllCategories();
		$data['title'] = 'Добавить запись';
		return $data;
    }
}