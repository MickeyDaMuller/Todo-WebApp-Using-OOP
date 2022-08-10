<?php
	namespace dbn;
	use PDO;
	use \dbn\DbConnect;

	include_once('dbConnect.php');
	class TodoModel extends DbConnect{

		protected function addTodoDb($todo){
			try{
				
			$date = date('y-m-d H-m-sa');
			$sql = "INSERT INTO post(title,created_date) value(?,?)";

			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([$todo,$date]);

			return $result;
		}catch(PDOException $e){

			return "Error message:".$e->getMessage();

		}
			
		}
		protected function getTodosDb(){
			try{
			$sql = "SELECT * FROM post";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

			return $result;
		}catch(PDOException $e){

			return "Error message:".$e->getMessage();

		}
		}
		protected function updateTodoDb($id){
			$sql = "UPDATE post SET completed='yes' WHERE id=?";

			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([$id]);

			return $result;
		}
		protected function DeleteTodoDb($id){
			try{
			$sql = "DELETE from post WHERE id=?";

			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([$id]);

			return $result;
		}catch(PDOException $e){

			return "Error message:".$e->getMessage();

		}
		}

	}

?>