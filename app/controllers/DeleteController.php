<?php

require_once ROOT_PATH . '/app/models/data.php';

class DeleteController extends ApplicationController{
	public function deleteAction(){
		$this->view->message = "hello from test::index";
	}

	public function deleteTaskAction(){
		$data_model = new Model_data();
		$data_model->deleteTask($_POST['id']);
		//header("Location: /web/index");
	}
}