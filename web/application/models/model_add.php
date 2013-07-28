<?php
class Model_Add extends Model
{
    public function get_data()
    {
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
			$sql = 'INSERT INTO posts (name, content, date, cleanurl) VALUES (:name,:text,:date,:cleanurl)';
			$sql = $this->base -> prepare($sql);
			$sql -> bindParam (':name',$data['name'],PDO::PARAM_STR);
			$data['text'] = str_replace("\r\n", "<br>", $data['text']);
			$sql -> bindParam (':text',$data['text'],PDO::PARAM_STR);
			$sql -> bindParam (':date',$data['date'],PDO::PARAM_STR);
			$sql -> bindParam (':cleanurl',$data['cleanurl'],PDO::PARAM_STR);
			$sql -> execute();			
			$data['message'] = "Добавлена успешно!";
		}
		$data['title'] = 'Добавить запись';
		return $data;
    }
}