<?php
class DataModel extends Model {
	private $ddbb;

	public function __construct() {
		$this->ddbb = file_get_contents("../app/models/data.json");
	}

	public function getTasks() {
		$array_Tasks = json_decode($this->ddbb, true);
		return $array_Tasks;
	}
	
	public function viewTask($id) {
		$arrayTasks = json_decode($this->ddbb, true);

		foreach ($arrayTasks as $i => $task) {
			if ($task['id'] == $id) {
				$taskToView = ($arrayTasks[$i]);
				return $taskToView;
			}
		}
	}

	public function newTask($task_name, $author_name, $start_date, $end_date, $task_status) {
		$arrayTasks = json_decode($this->ddbb, true);

		if ($arrayTasks != NULL) {
			$getLastArray = end($arrayTasks);
			$getId = current($getLastArray);
			$newKey = ++$getId;
		} else {
	   		$newKey = 1;
		}
		
		$arrayAdd = array(
			'id' => $newKey,
			'task_name' => $task_name,
			'author_name' => $author_name,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'task_status' => $task_status
			);
			
		if ($arrayTasks != NULL) {
			array_push($arrayTasks, $arrayAdd);
			$json = json_encode($arrayTasks);
		} else {
	 		$json = json_encode([$arrayAdd]);
		}
		
		file_put_contents("../app/models/data.json", $json);
		return header("Location: ../web/" );
	}

	public function removeTask($id) {
		$arrayTasks = json_decode($this->ddbb, true);
		
		foreach ($arrayTasks as $i => $task) {
		
			if ($task['id'] == $id) {
				unset($arrayTasks[$i]);
			}
		}

		$json = json_encode($arrayTasks);
		file_put_contents("../app/models/data.json", $json);
		return header("Location: ../web/" );
	}
	
	public function editTask($id) {
		$arrayTasks = json_decode($this->ddbb, true);

		foreach ($arrayTasks as $i => $task) {

			if ($task['id'] == $id) {
				$taskToEdit = ($arrayTasks[$i]);
				return $taskToEdit;
			}
		}
	}
	
	public function updateTask($id, $task_name, $author_name, $start_date, $end_date, $task_status) {
		$arrayTasks = json_decode($this->ddbb, true);

		foreach ($arrayTasks as $i => $task) {

			if ($task['id'] == $id) {
				 $arrayTasks[$i]['task_name'] = $task_name;
				 $arrayTasks[$i]['author_name'] = $author_name;
				 $arrayTasks[$i]['start_date'] = $start_date;
				 $arrayTasks[$i]['end_date'] = $end_date;
				 $arrayTasks[$i]['task_status'] = $task_status;
			}
		}

		$json = json_encode($arrayTasks);
		file_put_contents("../app/models/data.json", $json);
		return header("Location: ../web/" );
	}
}