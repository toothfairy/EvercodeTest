<?php
class Model_Post extends Model
{
    public function get_data()
    {		
		// определяем id
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		
		$cleanurl = $routes[2];
		$sql = 'SELECT id, name, content, date FROM posts WHERE cleanurl=:cleanurl';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':cleanurl',$cleanurl,PDO::PARAM_INT);
		$sql -> execute();
		$post = $sql -> fetch();
		
		if ($post) 
		{		
			$data['title'] = $post['name'];
			$data['post'] = $post; 
			return $data;
		}
		else {
			Route::ErrorPage404();
		}
	}
}	