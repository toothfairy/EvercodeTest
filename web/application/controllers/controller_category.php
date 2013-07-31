<?php
class Controller_Category extends Controller
{

	function __construct()
    {
        $this->model = new Model_Category();
        $this->view = new View();
    }
	
    function action_index()
    {		
		$data = $this->model->get_categories();
        $this->view->generate('category_all_view.php', 'template_view.php', $data);
    }
	function action_add()
	{
		$data = $this->model->add();
        $this->view->generate('category_add_view.php', 'template_view.php', $data);
	}
	function action_default()
    {		
        $data = $this->model->get_data();
        $this->view->generate('category_view.php', 'template_view.php', $data);
    }
}