<?php

require_once ROOT_PATH . '/app/models/data_model.php';

class ViewController extends ApplicationController {
	
	public function viewTaskAction() {
		$idTask = $_GET['id'];
		$dataModel = new dataModel();
		$getTask = $dataModel->viewTask($idTask);
		$this->view->listTask = $getTask;
	}
}