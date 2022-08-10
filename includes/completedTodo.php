<?php
	namespace dbn;
	use PDO;
	use \dbn\DbConnect;
	
	if(isset($_POST['id'])){
		include_once('../classes/todoController.php');
		$id = $_POST['id'];
		$update = new todoController();

		$updateTodo = $update->updateTodo($id);

		if($updateTodo){
			echo 'successfully updated!!';
		}else{
			echo 'something went wrong!!';
		}
	}


?>