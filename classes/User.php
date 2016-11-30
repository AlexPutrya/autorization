<?php
class User{
	private $user_name;
	private $user_pass;
	private $user_email;
	private $loggined;
	private $database;

	public function __construct($name, $pass, $email, $databse){
		$this->user_name = $name;
		$this->user_pass = $pass;
		$this->user_email = $email;
		$this->database = $database;
	}
	// тут нужно прописать метод из класа базы данных для внесения пользователя в базу
	public function createUser(){
		if($this->isExist()){
			echo "Такой логин уже занят";
		}else{
			// добавляем пользователя в базу данных и авторизируем
			$this->logIn();
		}
	}
	// Нужно проверить есть ли пользователь в базе данных
	public function isExist(){
		$sql = 'SELECT name FROM users WHERE email = ?';
		if($this->database->selectData($sql, $this->user_email)){
			// даем запрос и проверяем есть ли такой логин в бд если есть возбращаем
		return true;
		}else{
			return false;
		}
	}

	public function logIn(){
		$this->loggined = true;
	}

	public function logOut(){
		$this->loggined = false;
	}

	public function isLoggined(){
		return $this->loggined;
	}
}
?>