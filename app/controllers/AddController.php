<?php

require_once ROOT_PATH . '/app/models/data.php';

class AddController extends ApplicationController{
	public function addAction(){
		$this->view->message = "hello from test::index";
	}

	public function addTaskAction(){
		$data_model = new Model_data();
		$data_model->newTask($_POST["task"], $_POST["author_name"], $_POST["start_date"], $_POST["end_date"], $_POST["task_status"]);
		header("Location: /web/index");
	}

	public function deleteTaskAction(){
		$data_model = new Model_data();
		$data_model->deleteTask($_POST['id']);
		header("Location: /web/index");
	}
}