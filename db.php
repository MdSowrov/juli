<?php
class Db{
	private $conn;
	public function __construct($host, $user, $pass, $db){
		$this->conn = new mysqli($host, $user, $pass, $db);
		if($this->conn->connect_errno>0){
			die("Connection Failed" . $this->conn->connect_error);
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



public function getMenus($table, $cols, $condition){
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

public function getAllByCatId($table, $cols, $condition){
	$sql = "SELECT $cols FROM $table WHERE $condition";
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




public function readMore($content, $start, $end,$id, $btn_text){
	$new_content = explode(" ", $content);

	$to_array = array_slice($new_content, 0, 10);

	$read_more=implode(" ", $to_array)."&nbsp;&nbsp"."<a href='index.php?readmore=$id'>$btn_text</a>";
	return $read_more;
}

public function Insert($table, $cols){
	$sql = "INSERT INTO $table SET $cols";
	$result = $this->conn->query($sql);
	if($this->conn->affected_rows>0){
		return true;
	}
	return false;
}



}

$connect = new Db("localhost", "root", "", "juli" );
//print_r($connect->getById("menus", "*", "menu_id=2"));