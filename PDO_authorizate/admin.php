
<?php

require_once "db.php";

if (isset($_SESSION['user_login'])) {
	echo $_SESSION['user_login'] ."Welcome";

	echo "<h1>Welcom in Administration Panel</h1>";

echo "Your visits admin page ". $_COOKIE['page_visit'] . " times";
}else{
	echo "Dont have Acces to admin page";
}


