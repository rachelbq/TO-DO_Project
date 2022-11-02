<?php

require_once ROOT_PATH . '/app/models/data_model.php';

class IndexController extends ApplicationController {	
	
	public function indexAction() {
		$dataModel = new dataModel();
	    $content = $dataModel->getTasks();
		$this->view->content = $content;
	}

}
