<?php
namespace dbn;
use PDO;
use \dbn\DbConnect;
	include_once('todoModel.php');

	class TodoView extends TodoModel{
		public function getTodos(){
			return $this->getTodosDb();
		}
	}
?>