<?php 
/**
* MaFrame Library, useful library for database and php cores.
*
* @version 1.0
* @author Alin Koko Mansuby < alinkokomansuby@gmail.com >
* @copyright 2018
*
*/



Class DB_ko{
	public $config = array();
	public $connection;
	public function __construct()
	{
		$this->config['pathdb'] = "config/db.conf";
		$this->config['type']   = 1; // 1 = own variable , 2 = default variable harus sama dengan php
		$this->config['variable'] = "@ko_";

	}
	public function connect($host = null , $user = null , $pass = null , $db = null)
	{
		/*If not NULL parameter*/
		if($host != null && $user != null && $pass != null && $db != null)
		{
			$this->connection = mysqli_connect($host,$user,$pass,$db);
		}else{
		if(file_exists($this->config['pathdb']))
		{
			if($this->config['type'] == 1)
			{
				$c = file_get_contents($this->config['pathdb']);
				$c = str_replace("".$this->config['variable']."","\$",$c);
				@eval($c);
				$this->connection = mysqli_connect($hostname,$username,$password,$database);
			}elseif($this->config['type'] == 2)
			{
				require $this->config['pathdb'];
				$this->connection = mysqli_connect($hostname,$username,$password,$database);
			}
		}
	}
		return $this->connection;
	}
	public function query($q)
	{
		$r = mysqli_query($this->connect(),$q);
		return $r;
	}
	public function fetch($a)
	{
		$r = mysqli_fetch_array($a);
		return $r;
	}
	public function assoc($a)
	{
		$r = mysqli_fetch_assoc($a);
		return $r;
	}
	public function count_rows($a)
	{
		$r = mysqli_num_rows($a);
		return $r;
	}
	public function error()
	{
		$r = mysqli_error($this->connect());
		return $r;
	}
	public function select($table)
	{
		$sql = "SELECT * FROM $table";
		return $this->query($sql);
	}
	public function insert($table,$data = array())
	{
		$sql = "INSERT INTO $table VALUES(";
		for ($i=0; $i <= count($data)-1; $i++) { 
		$sql.= "'$data[$i]'";
	if($i != count($data)-1)
	{
		$sql.= ',';
	}
	}	
	$sql.= ")";
	return $this->query($sql);
	}
	public function update($table,$set = array(),$where)
	{
		$sql = "UPDATE $table SET ";
		$j = count($set)-1;
		$n = 0;
		foreach($set as $col=>$val)
		{
			$sql.="$col='$val'";
		if($n++ != $j){
		$sql.=",";}
		}
		$sql.= "WHERE ";
		foreach($where as $ww=>$kemana)
		{
			$sql.= "$ww='$kemana'";
		}
		return $this->query($sql);
	}
	public function delete($table,$where)
	{
		$sql = "DELETE FROM $table WHERE";
		foreach($where as $target=>$value)
		{
			$sql.= " $target='$value' ";
		}
		$sql.= "";
		return $this->query($sql);
	}
	public function query_result($result)
	{
		echo "<table border=\"1\" style=\"margin: 2px;border-collapse:collapse;border:1px solid #888\">".
           "<thead style=\"font-size: 80%\">";
      $numFields = mysqli_num_fields($result);
      // BEGIN HEADER
      $tables    = array();
      $nbTables  = -1;
      $lastTable = "";
      $fields    = array();
      $nbFields  = -1;
      while ($column = mysqli_fetch_field($result)) {
        if ($column->table != $lastTable) {
          $nbTables++;
          $tables[$nbTables] = array("name" => $column->table, "count" => 1);
        } else
          $tables[$nbTables]["count"]++;
        $lastTable = $column->table;
        $nbFields++;
        $fields[$nbFields] = $column->name;
      }
      for ($i = 0; $i <= $nbTables; $i++)
        echo "<th colspan=".$tables[$i]["count"].">".$tables[$i]["name"]."</th>";
      echo "</thead>";
      echo "<thead style=\"font-size: 80%\">";
      for ($i = 0; $i <= $nbFields; $i++)
        echo "<th>".$fields[$i]."</th>";
      echo "</thead>";
      // END HEADER
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        for ($i = 0; $i < $numFields; $i++)
          echo "<td>".htmlentities($row[$i])."</td>";
        echo "</tr>";
      }
      echo "</table></div>";
	}
	public function closecon()
	{
		return mysqli_close();
	}
	public function free($data)
	{
		return mysqli_free_result($data);
	}
}

 ?>