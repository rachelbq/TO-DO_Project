<?php

require_once ROOT_PATH . '/app/models/data_model.php';

class AddController extends ApplicationController {

	public function addTaskAction() {

		if (!empty($_POST)) {
			$dataModel = new dataModel();
			$dataModel->newTask($_POST["task_name"], $_POST["author_name"], $_POST["start_date"], $_POST["end_date"], $_POST["task_status"]);
		}
	}
	
	public function viewAction() {
		echo "hello from test::index";
	}
}
