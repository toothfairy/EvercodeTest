<?php
class templates
{
	function printHeader($title)
	{
		$header = file_get_contents("tmpl/header.html");
		$header = str_replace ("[[TITLE]]", $title, $header);
		echo $header;
	}
	function printFooter()
	{
		$footer = file_get_contents("tmpl/footer.html");
		echo $footer;
	}
	function printFormAdd($name='', $date='', $content='')
	{
		$form = file_get_contents("tmpl/formAdd.html");
		$form = str_replace ("[[NAME]]", $name, $form);
		$form = str_replace ("[[DATE]]", $date, $form);
		$form = str_replace ("[[CONTENT]]", $content, $form);
		echo $form;
	}
	function printFormID()
	{
		$form = file_get_contents("tmpl/formID.html");
		echo $form;
	}
	function printFormEdit($id, $name='', $date='', $content='')
	{
		$form = file_get_contents("tmpl/formEdit.html");
		$content = str_replace("<br>", "\r\n", $content);	// что бы удобно было редактировать
	
		$form = str_replace ("[[ID]]", $id, $form);
		$form = str_replace ("[[NAME]]", $name, $form);
		$form = str_replace ("[[DATE]]", $date, $form);
		$form = str_replace ("[[CONTENT]]", $content, $form);
		echo $form;
	}
}
class conf
{
	private $host;
	private $baseName;
	private $user;
	private $login;
	private $pass;
	private $numPosts;
	private function setParams()
	{
		$file = parse_ini_file("tmpl/conf.ini");
		$this->host = $file['host'];
		$this->baseName = $file['baseName'];
		$this->user = $file['user'];
		$this->login = $file['login'];
		$this->pass = $file['pass'];
		$this->numPosts = $file['numPosts'];
	}
	function Connect()
	{
		$base = new PDO("mysql:host=".$this->host.";dbname=".$this->baseName, $this->user); 
		$base -> query("set names utf8");
		return $base;
	}
	function __construct()
	{
		$this->setParams();
	}
	function getHost()
	{
		return $this->host;
	}
	function getBaseName()
	{
		return $this->baseName;
	}
	function getUser()
	{
		return $this->user;
	}
	function getNumPosts()
	{
		return $this->numPosts;
	}
	function getLogin()
	{
		return $this->login;
	}
	function getPass()
	{
		return $this->pass;
	}
	function getAuth()
	{	
		$auth = false;
		$login = $this->getLogin();
		$pas = $this->getPass();
		if (!isset($_SERVER['PHP_AUTH_USER'])) 
		{
			header('WWW-Authenticate: Basic realm="Authorization"');		
			// header('HTTP/1.0 401 Unauthorized');
			$auth = false;
		} else {			
			if ($login == $_SERVER['PHP_AUTH_USER'] and $pas == $_SERVER['PHP_AUTH_PW'])
				$auth = true;
			else {
				$auth = false;	
				header( "HTTP/1.0 401 Unauthorized");
				header('WWW-Authenticate: Basic realm="Wrong login/password"');
			}
		}	
		return $auth;	
	}
}

?>

