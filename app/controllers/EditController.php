<?php

require_once ROOT_PATH . '/app/models/data_model.php'; 

class EditController extends ApplicationController {

	public function editTaskAction() {
		$idTask = $_GET['id'];
		$dataModel = new dataModel();
		$getTask = $dataModel->editTask($idTask);
		$this->view->editingTask = $getTask;
		
			if (!empty($_POST)) {
				$dataModel->updateTask($_GET["id"],$_POST["task_name"], $_POST["author_name"], $_POST["start_date"], $_POST["end_date"], $_POST["task_status"]);
			}
	}
	
	public function viewAction() {
		echo "hello from test::index";
	}
}
