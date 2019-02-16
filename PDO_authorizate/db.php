<?php
	
$driver  = "mysql";
$host    = "localhost";
$db_name = "PDO_script";
$db_user = "root";
$db_pass = "test02156";
$charset = "utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];



try{

$pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);

//========== Встановлюємо куку =======
if (isset($_COOKIE['page_visit'])) {
	setcookie('page_visit', ++$_COOKIE['page_visit'], time() + 5);
}else{
		setcookie('page_visit', 1, time() + 5);
		 $_COOKIE['page_visit'] = 1;
}

session_start();

}catch(PDOException $e){
  die("Cant connect to DATA BASE!");
}

$result = $pdo->query('SELECT * FROM muvies2');

// ======= Виводимо обрані нами значення з таблиці ==========================
// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
// 	echo "Film "  .  $row['title'] .  " Duration "  . $row['duration']  .  " Minits  <br />";
// }

// ======== Метод fetchALL Який повертаэ всі строки таблиці в виді багатомірного масиву  ==============
// $rows = $result->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($rows);

//========= Використання підготовлених запитів PLACEHOLDER ===================
###### Іменовані плейсхолдери ##############

$sql = 'SELECT title FROM muvies2 WHERE duration = :duration';
$stmt = $pdo->prepare($sql);
$params = [':duration' => '210'];
$stmt->execute($params);
$rows =$stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// var_dump($rows);


###### Позиційні плейсхолдери ##############

$sql_pos = 'SELECT title FROM muvies2 WHERE duration = ?';
$stmt_pos = $pdo->prepare($sql_pos);
$stmt_pos->execute(['210']);
$rows_pos =$stmt_pos->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// var_dump($rows_pos);









