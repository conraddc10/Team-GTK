<?php 
/**
* 
*/
class Model
{
	public $table;
	private $db;
	private $foreignKey;
	private $relType;
	private $foreign;
	private $primary;

	function __construct()
	{
		include 'database.php'; 
		
		try {
			$this->db = new PDO("mysql:host=".$host.";dbname=".$database_name, $username, $password);
		} catch (Exception $e) {
			echo "error: database.php";
			
		}
	}
	
	function insert($data)
	{ 	

		$var = $this->table;
		$q = " INSERT INTO {$var} SET ";

		$limit = count($data);
		$counter = 1;
		foreach ($data as $key => $value) 
		{
			$val[$counter-1] = $value; 
			
			if($counter!=$limit)
			{
				$q .= $key."= ?, ";
			}
			else
			{
				$q .= $key."= ? ";
			}

			$counter++;
		}
		
		$query = $this->db->prepare($q);
		$i = 0;
		foreach($data as $key => $value)
		{
			$query->bindParam($i+1, $val[$i]);
			$i++;
		}

		if(!$query->execute())
		{
			print_r($query->errorInfo());
		}
		return $this->db->lastInsertId();
	}

	function select($where = null)
	{
		$var = $this->table;

		if($where == null)
		{
			$q = "SELECT * FROM `$var`";
		}
		else
		{
			$q = "SELECT * FROM `$var` WHERE ".$where;
		}

		$query = $this->db->prepare($q);

		if(!$query->execute())
		{
			print_r($query->errorInfo());
		}
		
		$results = $query->fetchAll(PDO::FETCH_ASSOC);

		if($results)
		{
			return $results;
		}
		else
		{
			return false;
		}
	}

	function query($q)
	{
		$query = $this->db->prepare($q);
		return $query->execute();
	}

	function delete($where)
	{
		$var = $this->table;

		$q = "DELETE FROM `$var` WHERE ".$where;

		$query = $this->db->prepare($q);

		if(!$query->execute())
		{
			print_r($query->errorInfo());
		}
	}

	function update($where, $data)
	{
		$var = $this->table;
		$q = " UPDATE `$var` SET ";

		$limit = count($data);
		$counter = 1;
		foreach ($data as $key => $value) 
		{
			$val[$counter-1] = $value; 
			
			if($counter!=$limit)
			{
				$q .= $key."= ?, ";
			}
			else
			{
				$q .= $key."= ? WHERE ".$where;
			}

			$counter++;
		}
		
		$query = $this->db->prepare($q);
		$i = 0;
		foreach($data as $key => $value)
		{
			$query->bindParam($i+1, $val[$i]);
			$i++;
		}

		if(!$query->execute())
		{
			
		}
	}

	

	function left_join($foreign, $primary)
	{
		$var = $this->table;

		$mod = new Model();

		$var = $this->table;

		$mod->table 	= $var;
		$mod->foreign 	= $foreign;
		$mod->primary 	= $primary;

		return $mod;

		
	}

	
	function getData($tbl)
	{
				$foreign 	= $this->foreign;
			
				$primary	= $this->primary;
				$tableA 	= $this->table;
				$q = "SELECT {$tableA}.*, {$tbl}.description, {$tbl}.genre FROM {$tableA} LEFT JOIN {$tbl} ON {$tableA}.{$foreign} = {$tbl}.{$primary}";
				
				$query = $this->db->prepare($q);

				if(!$query->execute())
				{
					print_r($query->errorInfo());
				}
				
				$results = $query->fetchAll(PDO::FETCH_ASSOC);

				if($results)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}
}
 ?>