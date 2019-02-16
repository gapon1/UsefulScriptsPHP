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

echo "<pre>";
var_dump($rows);


###### Позиційні плейсхолдери ##############












