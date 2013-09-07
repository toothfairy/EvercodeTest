<?php
class Model_Main extends Model
{
    public function get_data()
    {				
		// определяем номер страницы
		$url = $_SERVER['REQUEST_URI'];
        if (strpos($url, '?'))
			{
				 $url = substr($url, 0, strpos($url, '?'));
			}
		$routes = explode('/', $url);
		if ($url == '/' or $url == '/main')
		{
			$page = 1;
		}
		else
		{
			if (is_numeric($routes[2])) {
				$page = $routes[2];
			}
			elseif ($routes[2] != NULL) {
				Route::ErrorPage404();
			}
			else {
				$page = 1;
			}
		}
		$posts = $this -> base -> getAllPosts();
			
		$n = count($posts);
		$postsOnPage = $this->numPosts;
		$numPages = ceil($n/$postsOnPage);
		$postStart = $page*$postsOnPage - $postsOnPage;
		$postEnd = $page*$postsOnPage - 1;
		
		if ($postEnd >= $n)
			$postEnd = $n - 1;	
		if ($page > $numPages)
		{
			Route::ErrorPage404();
		}
		$posts = array_slice($posts,$postStart,$postEnd-$postStart+1);
		
		$data['title'] = 'Главная страница';
		$data['posts'] = $posts;
		$data['page'] = $page;
		$data['maxpage'] = $numPages;
		return $data;
		
    }
}