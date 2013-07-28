<?php
class Model_Register extends Model
{
    public function get_data()
    {		
		
		$data['login'] = isset($_POST['login']) ? $_POST['login'] : '';
		$data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
		$data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
		if ($data['fl']) 
		{
			 if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login']))
			{
				$data['errors']['login1'] = "Логин может состоять только из букв английского алфавита и цифр";
			}
			if(strlen($data['login']) < 3 or strlen($data['login']) > 20)
			{
				$data['errors']['login2'] = "Логин должен быть не меньше 3-х символов и не больше 20";
			}
			$sql = 'SELECT COUNT(id) FROM users WHERE login=:login';
			$sql = $this -> base -> prepare($sql);
			$sql -> bindParam (':login',$data['login'],PDO::PARAM_STR);
			$sql -> execute();
			$user = 0;
			$user = $sql -> fetch();
			if ($user['COUNT(id)'] > 0)
			{
				$data['errors']['login3'] = "Пользователь с таким логином уже существует";
			}
			if(strlen($data['password']) < 6 or strlen($data['password']) > 20)
			{
				$data['errors']['password'] = "Пароль должен быть не меньше 6 символов и не больше 20";
			}
			if (!preg_match("/^(?:[a-z0-9]+(?:[-_]?[a-z0-9]+)?@[a-z0-9]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($data['email'])))
			{
				$data['errors']['email'] = "Некорректный e-mail";
			}
			if (!isset($data['errors']))
			{
				// если ошибок нет - регистрируем
				$sql = 'INSERT INTO users (login, password, email) VALUES (:login,:password,:email)';
				$sql = $this->base -> prepare($sql);
				$sql -> bindParam (':login',$data['login'],PDO::PARAM_STR);
				$sql -> bindParam (':password',$data['password'],PDO::PARAM_STR);
				$sql -> bindParam (':email',$data['email'],PDO::PARAM_STR);
				$sql -> execute();			
				$data['message'] = "Регистрация прошла успешно";
			}
			else
			{
				$data['message'] = "Ошибка:";
			}
		}
		else	
		{
			$data['message'] = 'Заполните форму регистрации';
		}
		
		$data['title'] = 'Регистрация';
		return $data;
    }
}