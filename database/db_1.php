<?php
  //definicja stałych
  define('SQL_HOST','mysql-mczaronekm.ogicom.pl');
  define('SQL_USER', 'db236279');
  define('SQL_PASS', 'A96090502955l');//hasło admin1 było by już ekstrawagancją ;)
  define('SQL_DB', 'db236279');//tak sobie nazwałem moją bazę
  
  //połączenie
  $conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS) or die ("Nie udało sie połączyć z bazą danych MySQL " . mysql_error());
  mysql_select_db(SQL_DB, $conn);
  
  //informacje do poprawnego kodowania
  mysql_query("SET NAMES utf8");
  mysql_query("SET CHARACTER SET utf8");
  mysql_query("SET collation_connection = utf8_general_ci");
?>