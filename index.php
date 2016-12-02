<?php
spl_autoload_register(function($class_name){
	include_once "classes/" . $class_name . ".php";
});

$database = new DB();
$database->connect();
$post_data = array();

if(isset($_POST)){
	foreach ($_POST as $key => $value) {
		$post_data[$key] = htmlspecialchars($value);
	}
	$user = new User($post_data['user_name'], $post_data['password'], $post_data['email'], $database);
        $user->createUser();
}else{
    echo "Введите данные";
}
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php" method="post">
		<p>Имя</p>
		<input type="text" name="user_name">
		<p>Емейл</p>
		<input type="text" name="email">
		<p>Пароль</p>
		<input type="password" name="password"><br>
		<input type="submit" name="login" value="Войти">
		<input type="button" name="registrated" value="Зарегистрироватся">
	</form>
</body>
</html>