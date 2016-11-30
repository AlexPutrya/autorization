<?php
class DB{
	private $db_user = 'alex';
	private $host = 'localhost';
	private $db_name = 'autorization';
	private $db_pass = "castell13";
	private $opt = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);
	private $pdo;
	public function connect(){
		$dns = "mysql:host=$this->host;dbname=$this->db_name";
		$this->pdo = new PDO($dns, $this->db_user, $this->db_pass, $this->opt);
		return true;
	}

	public function 
}
?>