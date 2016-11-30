<?php
spl_autoload_register(function($class_name){
	include_once "classes/" . $class_name . ".php";
});
$database = new DB();
$database->connect();
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php" method="post">
		<p>Логин</p>
		<input type="text" name="login">
		<p>Пароль</p>
		<input type="password" name="password"><br>
		<input type="submit" name="login" value="Войти">
		<input type="button" name="registrated" value="Зарегистрироватся">
	</form>
</body>
</html>