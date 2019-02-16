
<?php

require_once "db.php";


if ( isset( $_SESSION['user_login'] )) {
	
	echo "<h3> ___" . $_SESSION['user_login'] . "___ Welcome </h3> ";

	echo "Your visits admin page ". $_COOKIE['page_visit'] . " times";
	echo " <a href='logout.php'>Logout page</a>";

}else{
	echo "Dont have Acces to admin page";
}


