<?php
class Model
{
	public $base;
	public $host;
	public $baseName;
	public $user;
	public $login;
	public $pass;
	public $numPosts;
	function __construct()
	{
		$file = parse_ini_file("/application/conf.ini");
		$this->host = $file['host'];
		$this->baseName = $file['baseName'];
		$this->user = $file['user'];
		$this->login = $file['login'];
		$this->pass = $file['pass'];
		$this->numPosts = $file['numPosts'];
		$base = new PDO("mysql:host=".$this->host.";dbname=".$this->baseName, $this->user); 
		$base -> query("set names utf8");
		$this -> base = $base;
	}
    public function get_data()
    {
    }
}