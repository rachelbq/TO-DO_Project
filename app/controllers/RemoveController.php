<?php

require_once ROOT_PATH . '/app/models/data_model.php';

class RemoveController extends ApplicationController {
	
	public function removeTaskAction() {
		$idTask = $_GET['id'];
		$dataModel = new dataModel();
		$dataModel->removeTask($idTask);
	}
}