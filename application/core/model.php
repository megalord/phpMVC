<?php
class model{

	private $db;

	function __construct(){
		$this->db = new mysqli(db_host, db_username, db_password, db_name);
		if($this->db->connect_error){
			exit();
		};
	}
	
	private function whereClause($array){
        $string = '';
        $prefix = ' WHERE ';
        foreach($array as $key => $value){
            $string .= $prefix."$key='$value'";
            $prefix = ' AND ';
        };
        return $string;
    }

	public function select($table, $identifier = null, $join = null, $index = null, $columns = '*'){
		if(!is_null($join) && !is_null($index)){
			$table = "$table JOIN $join USING ($index)";
		};
		$query = "SELECT $columns FROM $table";
		if(!is_null($identifier)){
            $query .= $this->whereClause($identifier);
		};
		return $this->db->query($query);
	}

	public function insert($table, $array){
		$keys = implode(array_keys($array), ",");
		$values = implode($array, "','");
		$this->db->query("INSERT INTO $table ($keys) VALUES ('$values')");
	}

	public function update($table, $identifier, $newValues){
		$queryString = "";
		foreach($newValues as $field => $value){
			$queryString .= "$field='$value', ";
		}
		$queryString = rtrim($queryString, ", ");
		$queryString .= $this->whereClause($identifier);
		$this->db->query("UPDATE $table SET $queryString");
	}

	public function delete($table, $identifier){
		$query = "DELETE FROM $table".$this->whereClause($identifier);
		$this->db->query($query);
	}

	public function getInfo($table){
		$result = $this->db->query("SHOW FULL COLUMNS FROM $table");
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row['Field'];
		};
		return $data;
	}

}
?>
