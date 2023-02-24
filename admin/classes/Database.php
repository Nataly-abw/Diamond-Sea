<?php

class Database
{
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "project_db");
		return $this->con;
	}
}

?>