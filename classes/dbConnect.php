<?php
namespace dbn;
use PDO;

	class DbConnect{
		private $Dbservername = 'localhost';
		private $Dbusername = 'root';
		private $Dbpassword = 'root';
		private $Dbname = 'blog_post';

		private function pdoConnection(){
			$sqlConn = 'mysql:host='.$this->Dbservername.';dbname='.$this->Dbname;
			$conn = new PDO($sqlConn,$this->Dbusername,$this->Dbpassword);

			try{
				return $conn;

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		protected function connect(){
			return $this->pdoConnection();		
		}

	}
	
?>	