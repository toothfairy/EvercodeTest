<?php
class Model_Post extends Model
{
    public function get_data()
    {		
		// определяем url
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		
		$cleanurl = $routes[2];
		$post = $this -> base -> getOnePostUrl($cleanurl);
		$post['category'] = $this -> base -> getCategoryId($post['category_id']); 
		if (!$post) 
		{	
			Route::ErrorPage404();
		}
		
		$post['time'] = getPostTime($post['time'])." ".getPostDate($post['time']);
		$data['title'] = $post['name'];
		$data['post'] = $post; 
		return $data;
	
	}
}	