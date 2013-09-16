<?php
class Base {    
    private $base;
	private $host;
	private $baseName;
	private $user;
	private $login;
	private $pass;
	
    function __construct()
    {
		$file = parse_ini_file("/application/conf.ini");
		$this->host = $file['host'];
		$this->baseName = $file['baseName'];
		$this->user = $file['user'];
		$this->login = $file['login'];
		$this->pass = $file['pass'];
		$this -> base = new PDO("mysql:host=".$this->host.";dbname=".$this->baseName, $this->user); 
		$this -> base -> query("set names utf8");
		 
    }    
	function getAllPosts()
	{
		$sql = 'SELECT id, name, content, time, cleanurl FROM posts ORDER BY id DESC';
		$sql = $this -> base -> prepare($sql);
		$sql -> execute();
		$posts = $sql -> fetchAll();
		return $posts;
	}
	function getPostsByCat($id)
	{
		$sql = 'SELECT id, name, content, time, cleanurl 
				FROM posts
				WHERE category_id = :id
				ORDER BY id DESC';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> execute();
		$posts = $sql -> fetchAll();
		return $posts;
	}
	function addPost($name, $text, $cleanurl, $time, $login, $cat)
	{
		$sql = 'INSERT INTO posts (name, content, category_id, cleanurl, time, author_login) 
				VALUES (:name,:text,:cat,:cleanurl,:time,:login)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$text = str_replace("\r\n", "<br>", $text);
		$sql -> bindParam (':text',$text,PDO::PARAM_STR);
		$sql -> bindParam (':cat',$cat,PDO::PARAM_INT);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_STR);
		$sql -> bindParam (':time',$time,PDO::PARAM_STR);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();	
	}
	function isPostUrl ($cleanurl)
	{
		$sql = 'SELECT COUNT(id) FROM posts WHERE cleanurl=:cleanurl';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_STR);
		$sql -> execute();
		$post = $sql -> fetch();
		if ($post['COUNT(id)'] > 0)
			$fl = true;
		else
			$fl = false;			
		return $fl;
	}
	function getOnePostId($id)
	{
		$sql = 'SELECT id, name, content, category_id FROM posts WHERE id=:id';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> execute();
		$post = $sql -> fetch();
		return $post;
	}
	function getOnePostUrl($cleanurl)
	{
		$sql = 'SELECT id, name, content, category_id, time, author_login FROM posts WHERE cleanurl=:cleanurl';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_INT);
		$sql -> execute();
		$post = $sql -> fetch();
		return $post;
	}
	function updatePost($id, $newName, $newText, $newCategory)
	{
		$sql ="UPDATE posts 
			SET 
				name = :name, 
				content = :content,
				category_id = :cat
			WHERE
				id = :id;";
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> bindParam (':name',$newName,PDO::PARAM_STR);
		$newText = str_replace("\r\n", "<br>", $newText);
		$sql -> bindParam (':content',$newText,PDO::PARAM_STR);
		$sql -> bindParam (':cat',$newCategory,PDO::PARAM_INT);
		$bl = $sql -> execute();
	}
	function isUser($login)
	{
		$sql = 'SELECT COUNT(id) FROM users WHERE login=:login';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();
		$user = 0;
		$user = $sql -> fetch();
		if ($user['COUNT(id)'] > 0)
			$fl = true;
		else
			$fl = false;
			
		return $fl;
	}
	function getUser($login)
	{
		$sql = 'SELECT id, login, password FROM users WHERE login=:login';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();
		$user = $sql -> fetch();
		return $user;
	}
	function addUser($login,$password,$email)
	{
		$sql = 'INSERT INTO users (login, password, email) VALUES (:login,:password,:email)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> bindParam (':password',$password,PDO::PARAM_STR);
		$sql -> bindParam (':email',$email,PDO::PARAM_STR);
		$sql -> execute();
	}
	function getAllCategories()
	{
		$sql = 'SELECT id, name, cleanurl FROM categories';
		$sql = $this -> base -> prepare($sql);
		$sql -> execute();
		$cat = $sql -> fetchAll();
		return $cat;
	}
	function addCategory($name,$cleanurl)
	{
		$sql = 'INSERT INTO categories (name, cleanurl) VALUES (:name, :cleanurl)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_STR);
		$sql -> execute();
	}
	function isCategoryUrl ($cleanurl)
	{
		$sql = 'SELECT COUNT(id) FROM categories WHERE cleanurl=:cleanurl';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_STR);
		$sql -> execute();
		$cat = $sql -> fetch();
		if ($cat['COUNT(id)'] > 0)
			$fl = true;
		else
			$fl = false;			
		return $fl;
	}
	function getCategoryUrl ($cleanurl)
	{
		$sql = 'SELECT name, id FROM categories WHERE cleanurl=:cleanurl';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_STR);
		$sql -> execute();
		$cat = $sql -> fetch();
		return $cat;
	}
	function getCategoryId ($id)
	{
		$sql = 'SELECT name, cleanurl FROM categories WHERE id=:id';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> execute();
		$cat = $sql -> fetch();
		return $cat;
	}
}
