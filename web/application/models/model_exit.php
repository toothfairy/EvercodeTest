<?php
class Model_Exit extends Model
{
    public function get_data()
    {
		session_destroy();
		$data['message'] = "Выход выполнен";
		return $data;
    }
}