<?php

require_once "db.php";


$login = trim($_POST['login']);
$password = trim($_POST['password']);

if (!empty($login) && !empty($password) ) {

	$password = password_hash($password, PASSWORD_DEFAULT);
	
$sql = 'INSERT INTO users(login, password) VALUES(:login, :password)';


$params = [':login' => $login, ':password' => $password ];

$stmt = $pdo->prepare($sql);
$stmt->execute($params);


echo "Registeretad sucsessfuly";

}else{
	echo "Please fill all colums";
}