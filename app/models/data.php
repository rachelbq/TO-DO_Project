<?php

class DataModel extends Model{

    private $datajson;

    public function __construct(){
        $this->datajson = json_decode(file_get_contents(ROOT_PATH . '/app/models/data.json'));
    }

    public function getTasks(){
		$tasks = json_decode($this->datajson, true);
		return $tasks;
	}

    public function listTask($id){
		$tasks = json_decode($this->datajson, true);
		foreach ($tasks as $key => $task) {
			if ($task['id'] == $id) {
				$taskToList = ($tasks[$key]);
				return $taskToList;
            }
        }
    }    

    public function addTask($task, $author_name, $start_date, $end_date, $task_status){
        
        $array = array("id"=>"", "task"=>$task, "author_name"=>$author_name, "start_task"=>$start_task, "end_task"=>$end_task, "task_status"=>$task_status);
           
        if(file_exists("../app/models/data.json")){
            $content = file_get_contents("../app/models/data.json");
            $data = json_decode($content, true);
            $last = end($data);
            $array['id'] = $last['id']+1;
            array_push($data, $array);
            file_put_contents("../app/models/data.json",json_encode($data, JSON_PRETTY_PRINT));
        
        }else{
            $data = array();
            $array['id'] = 1;
            array_push($data, $array);
            $f = fopen("../app/models/data.json","w");
            fwrite($f, json_encode($data, JSON_PRETTY_PRINT));
            fclose($f);
        }
        header("Location: /web/index");
    }

    public function removeTask($id){

        $content = file_get_contents("../app/models/data.json");
        $data = json_decode($content, true);    
        
        foreach ($data as $key => $value){ 
            
            if ($value['id'] == $id){ 
                unset($data[$key]);
            } 
        } 
        file_put_contents('../app/models/data.json', json_encode($data, JSON_PRETTY_PRINT));
    }

    public function editTask($id, $task, $author_name, $start_date, $end_date, $task_status) {

        $content = file_get_contents("../app/models/data.json");
        $data = json_decode($content, true); 
        
        foreach ($data as $key => $value){ 
            if ($value['id'] == $id){
                if(isset($id)){$data[$key]['id'] = $id;}
                if(isset($task)){$data[$key]['task'] = $task;} 
                if(isset($author_name)){$data[$key]['author_name'] = $author_name;} 
                if(isset($start_date)){$data[$key]['start_date']= $start_date;} 
                if(isset($end_date)){$data[$key]['end_date'] = $end_date;} 
                if(isset($task_status)){$data[$key]['task_status'] = $task_status;} 
            } 
        }
        file_put_contents('../app/models/data.json', json_encode($data, JSON_PRETTY_PRINT));    
    }
}
?>