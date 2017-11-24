<?php
// MySQL 5.5
$db_host = "http://mysql-mczaronekm.ogicom.pl"; //host bazy danych
$db_name = "db236279"; //nazwa bazy danych
$user_name = "db236279"; //uzytkownik bazy danych
$password = "A96090502955l"; //haslo uzytkownika bazy danych

//polaczenie
$mysqli = @new mysqli(/*$db_host*/localhost, $user_name, $password, $db_name);
if ($mysqli->connect_error) {

    die('Connect Error ('.$mysqli->connect_errno.') '. $mysqli->connect_error);

    if (mysqli_connect_error()) {
       die('Connect Error (' . mysqli_connect_errno() . ') '
       . mysqli_connect_error());
    }else{echo "SUKCES";}
}
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

?>