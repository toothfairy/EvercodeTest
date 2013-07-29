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
		$post = $this -> base -> getOnePostUrl($cleanurl);
		
		if (!$post) 
		{	
			Route::ErrorPage404();
		}
		$data['title'] = $post['name'];
		$data['post'] = $post; 
		return $data;
	
	}
}	