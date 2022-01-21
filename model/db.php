<?php
class Database{

	function __construct()
	{
		# code...

	}
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;

	private function online(){
		$this->host='localhost';
		$this->dbusername='generics_gs';
		$this->dbpassword='54213;.,HbD+';
		$this->dbname='generics_gs';
		try{
			$connection=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->dbusername,$this->dbpassword);

		}catch(PDOExection $e){
			echo $e->getMessage();
		}
		return $connection;
	}
	private function offline(){
		$this->host='localhost';
		$this->dbusername='root';
		$this->dbpassword='';
		$this->dbname='nsp_learning';
		try{
			$connection=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->dbusername,$this->dbpassword);

		}catch(PDOExection $e){
			echo $e->getMessage();
		}
		return $connection;
	}

	protected function connect(){
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$word="localhost";
		//echo $actual_link;
		if(strpos($actual_link, $word) !== false){
			return $this->offline();
		} else{
			return $this->online();
		}



	}


}

class GS_Model extends Database{
	function __construct(){
		
	}


	function execute_query($sql){
		//echo $sql;
		$database=new Database();
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	
	function read_query($sql){
		$database=new Database();
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}



	
	function get_number_of_student(){
	    $database=new Database();
		$sql="SELECT COUNT(id) FROM `student_registration`";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo $sql;
		return $data[0]['COUNT(id)'];
	}

	function get_number_of_student_in_year($year){
	    $database=new Database();
		$sql="SELECT COUNT(id) FROM `student_registration` where year='$year'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo $sql;
		return $data[0]['COUNT(id)'];
	}

	function get_number_of_student_in_class($class){
	    $database=new Database();
		$sql="SELECT COUNT(id) FROM `student_registration` where class=$class";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//echo $sql;
		return $data[0]['COUNT(id)'];
	}


}
?>
