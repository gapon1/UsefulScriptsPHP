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

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	echo "Film "  .  $row['title'] .  " Duration "  . $row['duration']  .  " Minits  <br />";
}


