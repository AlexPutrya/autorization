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
        //Подключаемся к базе
	public function connect(){
		$dns = "mysql:host=$this->host;dbname=$this->db_name";
		$this->pdo = new PDO($dns, $this->db_user, $this->db_pass, $this->opt);
		return true;
	}
        //Метод выборки данных из таблицы
	public function selectData($sql, $parametr){
		//выборка данных
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($parametr);
                return $stmt->fetch();
	}
        //Метод добавления данных в таблицу
        public function addData($sql, $parametr){
                $smtm = $this->pdo->prepare($sql);
                $smtm->execute($parametr);
        }
}
?>