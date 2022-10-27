<?php

require_once ROOT_PATH . '/app/models/data.php';

class TaskController extends ApplicationController{
    
    public function taskAction()
	{
		$this->view->message = "hello from test::index";
		
	}
	
}