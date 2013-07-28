<?php
class Controller_Post extends Controller
{

	function __construct()
    {
        $this->model = new Model_Post();
        $this->view = new View();
    }
	
    function action_index()
    {		
		Route::ErrorPage404();
    }
	function action_default()
    {		
        $data = $this->model->get_data();
        $this->view->generate('post_view.php', 'template_view.php', $data);
    }
}