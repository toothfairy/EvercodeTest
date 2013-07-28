<?php
class Model_Main extends Model
{
    public function get_data()
    {		
		//$page = isset($_GET['page']) ? $_GET['page'] : 1;
		
		// определяем номер страницы
		$url = $_SERVER['REQUEST_URI'];
        $url = substr($url, strpos($url, '?'), strlen($url) - strpos($url, '?'));
		$routes = explode('/', $url);
		if ($_SERVER['REQUEST_URI'] == '/' or $_SERVER['REQUEST_URI'] == '/main')
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
		
		$sql = 'SELECT id, name, content, date, cleanurl FROM posts ORDER BY id DESC';
		$sql = $this -> base -> prepare($sql);
		$sql -> execute();
	
		$posts = $sql -> fetchAll();
			
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
		else
		{
			$posts = array_slice($posts,$postStart,$postEnd-$postStart+1);
		}
			
			
		$data['title'] = 'Главная страница';
		$data['posts'] = $posts;
		$data['page'] = $page;
		$data['maxpage'] = $numPages;
		return $data;
    }
}