
<?php

require_once "db.php";


$login = trim($_POST['login']);
$password = trim($_POST['password']);

if (!empty($login) && !empty($password) ) {

	
$sql = 'SELECT login, password FROM users WHERE login = :login';


$params = [':login' => $login];

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$user = $stmt->fetch(PDO::FETCH_OBJ);

if ($user) {

	
	if (password_verify($password, $user->password)) {
		header('Location: admin.php');
	}else{
		echo "Error LOgin or Password 1";
	}


}else{
	echo "Error LOgin or Password 2";
}


}else{
	echo "Please fill all colums";
}

