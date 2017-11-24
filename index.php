


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
input {
	padding: 20px;
	background-color: white;
	border: solid 1px;
	color: blue;
	font-weight: bold;
	font-size: 15px;
	border-radius: 10px;
}
input:hover{
	padding: 20px;
	background-color: blue;
	border: solid 1px;
	color: white;
	font-weight: bold;
	border-radius: 10px;
}
#option {
	
	text-align: center;
	width: 100%;
}
h1 {
	text-align: center;
}
#left_box{
	width:20%;
	float: left;
	
}
#right_box{
	width:80%;
	float: left;
}
strong {
	color: red;
}

</style>
<body>
<?php
		
		function SelectMySql(){
			include 'database/connect.php';
			
			$sql1 = "SELECT * FROM Druhowie";
			$sql2 = "SELECT * FROM Pojazdy";
			$sql3 = "SELECT * FROM Specjalizacja";
			$sql4 = "SELECT * FROM Typ_pojazdu";
			$sql5 = "SELECT * FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			echo "<div id='left_box'";
			
			echo "<p><strong>".$sql1."</strong></p>";
			while ($row1 = mysqli_fetch_assoc($result1)){
				echo " <p>".$row1['Imie']." <strong>|</strong> ".$row1['Nazwisko']." <strong>|</strong> ".$row1['Stopien']." </p>";
			}
			echo "<hr>";
			
			echo "<p><strong>".$sql2."</strong></p>";
			while ($row2 = mysqli_fetch_assoc($result2)){
				echo " <p>".$row2['Marka']." <strong>|</strong> ".$row2['Model']." <strong>|</strong> ".$row2['Typ']." <strong>|</strong> ".$row2['Rok_produkcji']." <strong>|</strong> ".$row2['Nr_rejestracyjny']." <strong>|</strong> ".$row2['Kryptonim']."</p>";
			}
			echo "<hr>";
			
			echo "<p><strong>".$sql3."</strong></p>";
			while ($row3 = mysqli_fetch_assoc($result3)){
				echo " <p>".$row3['Nazwa']." </p>";
			}
			echo "<hr>";
			
			echo "<p><strong>".$sql4."</strong></p>";
			while ($row4 = mysqli_fetch_assoc($result4)){
				echo " <p>".$row4['Nazwa']." </p>";
			}
			echo "<hr>";
			
			echo "<p><strong>".$sql5."</strong></p>";
			while ($row5 = mysqli_fetch_assoc($result5)){
				echo " <p>".$row5['Specjalizacja']." <strong>|</strong> ".$row5['Kierowca']." <strong>|</strong> ".$row5['Dowodca']." <strong>|</strong> ".$row5['Przod_rot_I']." <strong>|</strong> ".$row5['Pom_przod_rot_I']." <strong>|</strong> ".$row5['Przod_rot_II']." <strong>|</strong> ".$row5['Pom_przod_rot_II']." <strong>|</strong> ".$row5['Pojazd']." </p>";
			}
			echo "<hr>";
			
			echo "</div><div id='right_box'></div>";
			
		}
		function DbJson(){
			include 'database/connect.php';
			
			$json_array1 = array();
			$json_array2 = array();
			$json_array3 = array();
			$json_array4 = array();
			$json_array5 = array();
			
			$sql1 = "SELECT * FROM Druhowie";
			$sql2 = "SELECT * FROM Pojazdy";
			$sql3 = "SELECT * FROM Specjalizacja";
			$sql4 = "SELECT * FROM Typ_pojazdu";
			$sql5 = "SELECT * FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			while ($row1 = mysqli_fetch_assoc($result1)){
				
				$json_array1[] = $row1;
				
			}
			
			while ($row2 = mysqli_fetch_assoc($result2)){
				
				$json_array2[] = $row2;
				
			}
			while ($row3 = mysqli_fetch_assoc($result3)){
				
				$json_array3[] = $row3;
				
			}
			while ($row4 = mysqli_fetch_assoc($result4)){
				
				$json_array4[] = $row4;
				
			}
			while ($row5 = mysqli_fetch_assoc($result5)){
				
				$json_array5[] = $row5;
				
			}
			
			$file1 = fopen('files/json/druhowie.json','w');
			$json_file1 = fwrite($file1, json_encode($json_array1));
			
			$file2 = fopen('files/json/pojazdy.json','w');
			$json_file2 = fwrite($file2, json_encode($json_array2));
			
			$file3 = fopen('files/json/specjalizacja.json','w');
			$json_file3 = fwrite($file3, json_encode($json_array3));
			
			$file4 = fopen('files/json/typ_pojazdu.json','w');
			$json_file4 = fwrite($file4, json_encode($json_array4));
			
			$file5 = fopen('files/json/zastep.json','w');
			$json_file5 = fwrite($file5, json_encode($json_array5));
	
			echo "<div id='left_box'>";
			
			echo "<strong>".$sql1." </strong><pre>";
			print_r($json_array1);
			echo "</pre><hr>";
			
			echo "<strong>".$sql2." </strong><pre>";
			print_r($json_array2);
			echo "</pre><hr>";
			
			echo "<strong>".$sql3." </strong><pre>";
			print_r($json_array3);
			echo "</pre><hr>";
			
			echo "<strong>".$sql4." </strong><pre>";
			print_r($json_array4);
			echo "</pre><hr>";
			
			echo "<strong>".$sql5." </strong><pre>";
			print_r($json_array5);
			echo "</pre><hr>";
			echo "</div>";
			
			echo "<div id='right_box>'";
			if ($json_file1){echo "<p><strong>Utworzono plik files/json/druhowie.json</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/json/druhowie.json)!</p>";}
			echo "<p><strong>".$sql1."</strong><br>".json_encode($json_array1)."</p>";
			if ($json_file2){echo "<p><strong>Utworzono plik files/json/pojazdy.json</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/json/pojazdy.json)!</p>";}
			echo "<p><strong>".$sql2."</strong><br>".json_encode($json_array2)."</p>";
			if ($json_file3){echo "<p><strong>Utworzono plik files/json/specjalizacja.json</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/json/specializacja.json)!</p>";}
			echo "<p><strong>".$sql3."</strong><br>".json_encode($json_array3)."</p>";
			if ($json_file4){echo "<p><strong>Utworzono plik files/json/typ_pojazdu.json</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/json/typ_pojazdu.json)!</p>";}
			echo "<p><strong>".$sql4."</strong><br>".json_encode($json_array4)."</p>";
			if ($json_file5){echo "<p><strong>Utworzono plik files/json/zastep.json</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/json/zastep.json)!</p>";}
			echo "<p><strong>".$sql5."</strong><br>".json_encode($json_array5)."</p>";

			echo "</div>'";
			
			
		}
		function DbXml(){
			include 'database/connect.php';
			
			//array to xml
			function array_to_xml($array, &$xml_user_info) {
				foreach($array as $key => $value) {
					if(is_array($value)) {
						if(!is_numeric($key)){
							$subnode = $xml_user_info->addChild("$key");
							array_to_xml($value, $subnode);
						}else{
							$subnode = $xml_user_info->addChild("item$key");
							array_to_xml($value, $subnode);
						}
					}else {
						$xml_user_info->addChild("$key",htmlspecialchars("$value"));
					}
				}
			}
			
			$xml_array1 = array();
			$xml_array2 = array();
			$xml_array3 = array();
			$xml_array4 = array();
			$xml_array5 = array();
			
			$sql1 = "SELECT * FROM Druhowie";
			$sql2 = "SELECT * FROM Pojazdy";
			$sql3 = "SELECT * FROM Specjalizacja";
			$sql4 = "SELECT * FROM Typ_pojazdu";
			$sql5 = "SELECT * FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			while ($row1 = mysqli_fetch_assoc($result1)){
				
				$xml_array1[] = $row1;
				
			}
			
			while ($row2 = mysqli_fetch_assoc($result2)){
				
				$xml_array2[] = $row2;
				
			}
			while ($row3 = mysqli_fetch_assoc($result3)){
				
				$xml_array3[] = $row3;
				
			}
			while ($row4 = mysqli_fetch_assoc($result4)){
				
				$xml_array4[] = $row4;
				
			}
			while ($row5 = mysqli_fetch_assoc($result5)){
				
				$xml_array5[] = $row5;
				
			}
			

			$xml_druhowie = new SimpleXMLElement("<?xml version=\"1.0\"?><druhowie></druhowie>");
			array_to_xml($xml_array1,$xml_druhowie);
			//tworzymy plik
			$xml_file1 = $xml_druhowie->asXML('files/xml/druhowie.xml');
			
			$xml_pojazdy = new SimpleXMLElement("<?xml version=\"1.0\"?><pojazdy></pojazdy>");
			array_to_xml($xml_array2,$xml_pojazdy);
			//tworzymy plik
			$xml_file2 = $xml_pojazdy->asXML('files/xml/pojazdy.xml');
			
			$xml_specjalizacja = new SimpleXMLElement("<?xml version=\"1.0\"?><specjalizacja></specjalizacja>");
			array_to_xml($xml_array3,$xml_specjalizacja);
			//tworzymy plik
			$xml_file3 = $xml_specjalizacja->asXML('files/xml/specjalizacja.xml');
			
			$xml_typ_pojazdu = new SimpleXMLElement("<?xml version=\"1.0\"?><typ_pojazdu></typ_pojazdu>");
			array_to_xml($xml_array4,$xml_typ_pojazdu);
			//tworzymy plik
			$xml_file4 = $xml_typ_pojazdu->asXML('files/xml/typ_pojazdu.xml');
			
			$xml_zastep = new SimpleXMLElement("<?xml version=\"1.0\"?><zastep></zastep>");
			array_to_xml($xml_array5,$xml_zastep);
			//tworzymy plik
			$xml_file5 = $xml_zastep->asXML('files/xml/zastep.xml');
			

			
			echo "<div id='left_box'>";
			
			echo "<strong>".$sql1." </strong><pre>";
			print_r($xml_array1);
			echo "</pre><hr>";
			
			echo "<strong>".$sql2." </strong><pre>";
			print_r($xml_array2);
			echo "</pre><hr>";
			
			echo "<strong>".$sql3." </strong><pre>";
			print_r($xml_array3);
			echo "</pre><hr>";
			
			echo "<strong>".$sql4." </strong><pre>";
			print_r($xml_array4);
			echo "</pre><hr>";
			
			echo "<strong>".$sql5." </strong><pre>";
			print_r($xml_array5);
			echo "</pre><hr>";
			echo "</div>";
			
			echo "<div id='right_box'>";
			if ($xml_file1){echo "<p><strong>Utworzono plik files/xml/druhowie.xml</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/xml/druhowie.xml)!</p>";}
			echo "<p>".$xml_druhowie->asXML()."</p>";
			if ($xml_file2){echo "<p><strong>Utworzono plik files/xml/pojazdy.xml</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/xml/pojazdy.xml)!</p>";}
			echo "<p>".$xml_pojazdy->asXML()."</p>";
			if ($xml_file3){echo "<p><strong>Utworzono plik files/xml/specjalizacja.xml</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/xml/specjalizacja.xml)!</p>";}
			echo "<p>".$xml_specjalizacja->asXML()."</p>";
			if ($xml_file4){echo "<p><strong>Utworzono plik files/xml/typ_pojazdu.xml</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/xml/typ_pojazdu.xml)!</p>";}
			echo "<p>".$xml_typ_pojazdu->asXML()."</p>";
			if ($xml_file5){echo "<p><strong>Utworzono plik files/xml/zastep.xml</strong></p>";}else{echo "<p>Operacja zakończona niepowodzeniem (files/xml/zastep.xml)!</p>";}
			echo "<p>".$xml_zastep->asXML()."</p>";
			echo "</div>";
			
			
		}
		function JsonDb(){
			include 'database/connect.php';
			
			$sql1 = "DELETE FROM Druhowie";
			$sql2 = "DELETE FROM Pojazdy";
			$sql3 = "DELETE FROM Specjalizacja";
			$sql4 = "DELETE FROM Typ_pojazdu";
			$sql5 = "DELETE FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			if ($result1){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Druhowie</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result2){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Pojazdy</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result3){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Specializacja</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result4){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Typ_pojazdu</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result5){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli zastep</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			
			//decode json file to array
			$json_druhowie = file_get_contents('files/json/druhowie.json');
			$druhowie = json_decode($json_druhowie, true);
			
			$json_pojazdy= file_get_contents('files/json/pojazdy.json');
			$pojazdy = json_decode($json_pojazdy, true);
			
			$json_specializacja = file_get_contents('files/json/specjalizacja.json');
			$specializacja = json_decode($json_specializacja, true);
			
			$json_typ_pojazdu = file_get_contents('files/json/typ_pojazdu.json');
			$typ_pojazdu = json_decode($json_typ_pojazdu, true);
			
			$json_zastep = file_get_contents('files/json/zastep.json');
			$zastep = json_decode($json_zastep, true);
			
			echo "<br>";
			//dodawanie druhowie
			foreach ($druhowie as $row) {
				$id = $row['ID'];
				$imie = $row['Imie'];
				$nazwisko = $row['Nazwisko'];
				$stopien = $row['Stopien'];
				
				$insert_druhowie = "INSERT INTO `Druhowie`VALUES (".$id.", '".$imie."', '".$nazwisko."', '".$stopien."') ";
				$InsertResult1 = mysqli_query($mysqli, $insert_druhowie);
				
				echo $InsertResult1;
			}
			
			echo "<br>";
			//dodawanie pojazdy
			foreach ($pojazdy as $row2) {
				$id_pojazdu = $row2['ID_Pojazdu'];
				$marka = $row2['Marka'];
				$model = $row2['Model'];
				$typ = $row2['Typ'];
				$rok = $row2['Rok_produkcji'];
				$rej = $row2['Nr_rejestracyjny'];
				$krypt = $row2['Kryptonim'];
				
				$insert_pojazdy = "INSERT INTO `Pojazdy`VALUES (".$id_pojazdu.", '".$marka."', '".$model."', '".$typ."', '".$rok."', '".$rej."', '".$krypt."') ";
				$InsertResult2 = mysqli_query($mysqli, $insert_pojazdy);
				
				echo $InsertResult2;
			}
			
			echo "<br>";
			//dodawanie specializacja
			foreach ($specializacja as $row3) {
				$s_id = $row3['ID'];
				$s_nazwa = $row3['Nazwa'];
				
				$insert_specjalizacja = "INSERT INTO `Specjalizacja` VALUES (".$s_id.", '".$s_nazwa."') ";
				$InsertResult3 = mysqli_query($mysqli, $insert_specjalizacja);
				
				echo $InsertResult3;
			}
			
			echo "<br>";
			//dodawanie typ_pojazdu
			foreach ($typ_pojazdu as $row4) {
				$t_id = $row4['ID'];
				$t_nazwa = $row4['Nazwa'];
				
				$insert_typ_pojazdu = "INSERT INTO `Typ_pojazdu`VALUES (".$t_id.", '".$t_nazwa."') ";
				$InsertResult4 = mysqli_query($mysqli, $insert_typ_pojazdu);
				
				echo $InsertResult4;
			}
			
			echo "<br>";
			//dodawanie zastep
			foreach ($zastep as $row5) {
				$id = $row5['ID'];
				$spec = $row5['Specjalizacja'];
				$k = $row5['Kierowca'];
				$d = $row5['Dowodca'];
				$pr1 = $row5['Przod_rot_I'];
				$ppr1 = $row5['Pom_przod_rot_I'];
				$pr2 = $row5['Przod_rot_II'];
				$ppr2 = $row5['Pom_przod_rot_II'];
				$poj = $row5['Pojazd'];
				
				$insert_zastep = "INSERT INTO `Zastep`VALUES (".$id.", '".$spec."', '".$k."', '".$d."','".$pr1."', '".$ppr1."', '".$pr2."', '".$ppr2."', '".$poj."') ";
				$InsertResult5 = mysqli_query($mysqli, $insert_zastep);
				
				echo $InsertResult5;
			}
			
			
		}
		function XmlDb(){
			include 'database/connect.php';
			
			$sql1 = "DELETE FROM Druhowie";
			$sql2 = "DELETE FROM Pojazdy";
			$sql3 = "DELETE FROM Specjalizacja";
			$sql4 = "DELETE FROM Typ_pojazdu";
			$sql5 = "DELETE FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			if ($result1){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Druhowie</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result2){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Pojazdy</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result3){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Specializacja</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result4){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Typ_pojazdu</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result5){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli zastep</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			
			$xml1 = simplexml_load_file('files/xml/druhowie.xml');
			$xml2 = simplexml_load_file('files/xml/pojazdy.xml');
			$xml3 = simplexml_load_file('files/xml/specjalizacja.xml');
			$xml4 = simplexml_load_file('files/xml/typ_pojazdu.xml');
			$xml5 = simplexml_load_file('files/xml/zastep.xml');
			
			$jxml1 = json_encode($xml1);
			$druhowie = json_decode($jxml1, true);
			
			$jxml2 = json_encode($xml2);
			$pojazdy = json_decode($jxml2, true);
			
			$jxml3 = json_encode($xml3);
			$specializacja = json_decode($jxml3, true);
			
			$jxml4 = json_encode($xml4);
			$typ_pojazdu = json_decode($jxml4, true);
			
			$jxml5 = json_encode($xml5);
			$zastep = json_decode($jxml5, true);
			
			
			echo "<br>";
			//dodawanie druhowie
			foreach ($druhowie as $row) {
				$id = $row['ID'];
				$imie = $row['Imie'];
				$nazwisko = $row['Nazwisko'];
				$stopien = $row['Stopien'];
				
				$insert_druhowie = "INSERT INTO `Druhowie`VALUES (".$id.", '".$imie."', '".$nazwisko."', '".$stopien."') ";
				$InsertResult1 = mysqli_query($mysqli, $insert_druhowie);
				
				echo $InsertResult1;
			}
			
			echo "<br>";
			//dodawanie pojazdy
			foreach ($pojazdy as $row2) {
				$id_pojazdu = $row2['ID_Pojazdu'];
				$marka = $row2['Marka'];
				$model = $row2['Model'];
				$typ = $row2['Typ'];
				$rok = $row2['Rok_produkcji'];
				$rej = $row2['Nr_rejestracyjny'];
				$krypt = $row2['Kryptonim'];
				
				$insert_pojazdy = "INSERT INTO `Pojazdy`VALUES (".$id_pojazdu.", '".$marka."', '".$model."', '".$typ."', '".$rok."', '".$rej."', '".$krypt."') ";
				$InsertResult2 = mysqli_query($mysqli, $insert_pojazdy);
				
				echo $InsertResult2;
			}
			
			echo "<br>";
			//dodawanie specializacja
			foreach ($specializacja as $row3) {
				$s_id = $row3['ID'];
				$s_nazwa = $row3['Nazwa'];
				
				$insert_specjalizacja = "INSERT INTO `Specjalizacja` VALUES (".$s_id.", '".$s_nazwa."') ";
				$InsertResult3 = mysqli_query($mysqli, $insert_specjalizacja);
				
				echo $InsertResult3;
			}
			
			echo "<br>";
			//dodawanie typ_pojazdu
			foreach ($typ_pojazdu as $row4) {
				$t_id = $row4['ID'];
				$t_nazwa = $row4['Nazwa'];
				
				$insert_typ_pojazdu = "INSERT INTO `Typ_pojazdu`VALUES (".$t_id.", '".$t_nazwa."') ";
				$InsertResult4 = mysqli_query($mysqli, $insert_typ_pojazdu);
				
				echo $InsertResult4;
			}
			
			echo "<br>";
			//dodawanie zastep
			foreach ($zastep as $row5) {
				$id = $row5['ID'];
				$spec = $row5['Specjalizacja'];
				$k = $row5['Kierowca'];
				$d = $row5['Dowodca'];
				$pr1 = $row5['Przod_rot_I'];
				$ppr1 = $row5['Pom_przod_rot_I'];
				$pr2 = $row5['Przod_rot_II'];
				$ppr2 = $row5['Pom_przod_rot_II'];
				$poj = $row5['Pojazd'];
				
				$insert_zastep = "INSERT INTO `Zastep`VALUES (".$id.", '".$spec."', '".$k."', '".$d."','".$pr1."', '".$ppr1."', '".$pr2."', '".$ppr2."', '".$poj."') ";
				$InsertResult5 = mysqli_query($mysqli, $insert_zastep);
				
				echo $InsertResult5;
			}
			
		}
		function DelDb(){
			include 'database/connect.php';
			$sql1 = "DELETE FROM Druhowie";
			$sql2 = "DELETE FROM Pojazdy";
			$sql3 = "DELETE FROM Specjalizacja";
			$sql4 = "DELETE FROM Typ_pojazdu";
			$sql5 = "DELETE FROM Zastep";
			
			$result1 = mysqli_query($mysqli, $sql1);
			$result2 = mysqli_query($mysqli, $sql2);
			$result3 = mysqli_query($mysqli, $sql3);
			$result4 = mysqli_query($mysqli, $sql4);
			$result5 = mysqli_query($mysqli, $sql5);
			
			if ($result1){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Druhowie</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result2){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Pojazdy</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result3){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Specializacja</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result4){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli Typ_pojazdu</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
			if ($result5){ echo "<p><strong>Usunięto wszystkie rekordy z tabeli zastep</p>";}else {echo "<p>Operacja zakonczona niepowodzeniem!";}
		}
?>
    <h1>Przyrost II</h1>
	<hr>
	
	
	<div id="option">
		
		<table>
			<tr>
				<td><form method="POST" action="bin/main.php"><input type='submit' name='Main' value="Pagination"></form>
				<td><form method="POST"><input type='submit' name='SelectMySql' value="VIEW DATA FROM DATABASE"></form>
				<td><form method="POST"><input type="submit" name="DbJson" value="DATABASE TO JSON"></form>
				<td><form method="POST"><input type="submit" name="DbXml" value="DATABASE TO XML"></form>
				<td><form method="POST"><input type="submit" name="JsonDb" value="JSON TO DATABASE"></form>
				<td><form method="POST"><input type="submit" name="XmlDb" value="XML TO DATABASE"></form>
				<td><form method="POST"><input type="submit" name="DelDb" value="DELETE ALL RECORDS FROM DATABASE"></form>
			</tr>
		</table>
	
		
		<hr>
	</div>

		<?php 
			if (isset($_POST['SelectMySql'])){
				SelectMySql();
				unset($_POST['SelectMySql']);
			}
			
			if (isset($_POST['DbJson'])){
				DbJson();
			}
			if (isset($_POST['DbXml'])){
				DbXml();
			}
			if (isset($_POST['JsonDb'])){
				JsonDb();
			}
			if (isset($_POST['XmlDb'])){
				XmlDb();
			}
			if (isset($_POST['DelDb'])){
				DelDb();
			}
				
		?>
	
	
</body>
</html>