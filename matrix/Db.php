<?php
class DB{
	private $conn;
	public function __construct($host, $user, $pass, $db){
		$this->conn = new mysqli($host, $user, $pass, $db);
	if(!$this->conn){
		die("Connection Faild" .$this->conn->connect_error);
	}
}

public function getAll($table, $cols){
	$sql = "SELECT $cols FROM $table";
	$result = $this->conn->query($sql);
	if($result->num_rows>0){
		return $result->fetch_all(MYSQLI_ASSOC);
	}else{
		return false;
	}
}


public function getComments($table, $cols, $condition){
	$sql = "SELECT $cols FROM $table WHERE $condition";
	$result = $this->conn->query($sql);
	if($result->num_rows>0){
		return $result->fetch_all(MYSQLI_ASSOC);
	}else{
		return false;
	}
}


public function getById($table, $cols, $condition){
	$sql = "SELECT $cols FROM $table WHERE $condition";
	$result = $this->conn->query($sql);
	if($result->num_rows>0){
		return $result->fetch_assoc();
	}else{
		return false;
	}
}






public function Insert($table, $cols){
	$sql = "INSERT INTO $table SET $cols";
	$result = $this->conn->query($sql);
	if($this->conn->affected_rows>0){
		return true;
	}
	return false;
}




public function Update($table, $cols, $condition){
	$sql = "UPDATE $table SET $cols WHERE $condition";
	$result = $this->conn->query($sql);
	if($this->conn->affected_rows>0){
		return true;
	}
	return false;
}



public function Delete($table, $condition){
	$sql = "DELETE FROM $table WHERE $condition";
	$result = $this->conn->query($sql);
	if($this->conn->affected_rows>0){
		return true;
	}
	return false;
}


}
$obj = new DB("localhost", "root", "", "juli");
/*echo "<pre>";
print_r($obj->getAll("students", "*"));*/



/*
if($obj->getAll("students", "*")!=false){
print_r($obj->getAll("students", "*"));
}
*/


/*
if($obj->getById("students", "*", "id=2")!=false){
print_r($obj->getById("students", "*", "id=2"));
}

/*if($obj->Insert("students", "name='Sowrov', mobile='017222', address='Dhaka' ")){
	echo "Insert success";
}else{
	echo "Insert Fail";
}
*/
/*
echo "<br/>";

if($obj->Update("students", "name='Sakib'", "id=4")){
	echo "Update success";
}else{
	echo "Update Fail";
}

echo "<br/>";

if($obj->Delete("students","id=11")){
	echo "Delete success";
}else{
	echo "Delete Fail";
}
*/

?>