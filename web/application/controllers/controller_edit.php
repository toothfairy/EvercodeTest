<?php
class Controller_Edit extends Controller
{
	function __construct()
    {
        $this->model = new Model_Edit();
        $this->view = new View();
    }	
    function action_index()
    {		
		Route::ErrorPage404();
    }
	function action_default()
    {		
        $data = $this->model->get_data();
        $this->view->generate('edit_view.php', 'template_view.php', $data);
    }
}