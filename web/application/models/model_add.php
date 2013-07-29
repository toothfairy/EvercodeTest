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
		$data['date'] = isset($_POST['date']) ? $_POST['date'] : '';
		$data['text'] = isset($_POST['text']) ? $_POST['text'] : '';
		
		$data['cleanurl'] = translit($data['name']); 
		
		if ($data['name'] == '' and $data['date'] == '' and $data['text'] == '')
		{
			$data['message'] = "Добавить запись:";
		}
		elseif ($data['name'] == '' or $data['date'] == '' or $data['text'] == '')
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
			$this -> base -> addPost($data['name'],$data['text'],$data['date'],$data['cleanurl']);
			$data['message'] = "Добавлена успешно!";
		}
		$data['title'] = 'Добавить запись';
		return $data;
    }
}