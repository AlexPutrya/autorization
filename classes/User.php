<?php
class User{
	private $user_name;
	private $user_pass;
	private $user_email;
	private $loggined;
	private $database;

	public function __construct($name, $pass, $email, DB $database){
		$this->user_name = $name;
		$this->user_email = $email;
                $this->user_pass = $pass;
		$this->database = $database;
	}
        //Проверяем нет ли такого в БД, добавляем в базу и авторизируем
	public function createUser(){
		if($this->isExist()){
			echo "Такой логин уже занят";
		}else{
			// добавляем пользователя в базу данных и авторизируем
                        $sql = "INSERT INTO users VALUES('', :name, :email, :password)";
                        $parametr = array("name" => "$this->user_name",
                                          "email" => "$this->user_email",
                                          "password" => "$this->user_pass" );
                        $this->database->addData($sql, $parametr);
                        $this->logIn();
			echo "Поздравляем с регистрацией";
		}
	}
	// Метод проверки наличия пользователя в бд
	public function isExist(){
                $parametr = array("email" => "$this->user_email");
                $sql = 'SELECT name FROM users WHERE email = :email';
		if($this->database->selectData($sql, $parametr)){
                    return true;
		}else{
                    return false;
		}
	}

	public function logIn(){
                $parametr = array("email" => "$this->user_email");
                $sql = 'SELECT password FROM users WHERE email = :email';
                $result = $this->database->selectData($sql, $parametr);
                if($result['password'] == $this->user_pass){
                    $this->loggined = true;
                    echo "<br> Добро пожаловать на сайт";
                }else{
                    echo "Неправильно введенные логин или пароль, попробуйте снова";
                    $this->loggined = false;
                }
	}

	public function logOut(){
		$this->loggined = false;
	}

	public function isLoggined(){
		return $this->loggined;
	}
}
?>