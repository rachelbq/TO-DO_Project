<?php

require_once ROOT_PATH . '/app/models/data.php';

class EditController extends ApplicationController{

	public function editAction(){
		$this->view->message = "hello from test::index";
	}
	
	public function changesAction(){
		$model_data = new Model_data();
		$model_data->editTak($_POST['task'],$_POST['author_name'],$_POST['start_date'],$_POST['end_date'],$_POST['task_status'], $_POST['id']);
		//header("Location: /web/index");
	}
}