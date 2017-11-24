<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

    <h1>Przyrost II</h1>
	<hr>
	
	
	<div id="option">
		
		<table>
			<tr>
				<td><form method="POST" action="../index.php"><input type='submit' name='Prev' value="Cofnij"></form>
				
			</tr>
		</table>
	
		
		<hr>
	</div>
	
	<?php
		function ToJson($queries){
			include '../database/connect.php';
			
			
			$json_array = array();
			$result1 = mysqli_query($mysqli, $queries);
			
			while ($row1 = mysqli_fetch_assoc($result1)){
				
				$json_array[] = $row1;
				
				
				
				
			}
			
			$file1 = fopen('../files/json/wyjazdy.json','w');
				$json_file1 = fwrite($file1, json_encode($json_array));
				
				echo "<hr><p>";
				echo "<p><h1>JSON</h1></p>";
				print_r($json_array);
				echo "</p>";
			
		}
		function ToXml($queries){
			include '../database/connect.php';
			
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
			

			$result1 = mysqli_query($mysqli, $queries);
			
			
			while ($row1 = mysqli_fetch_assoc($result1)){
				
				$xml_array1[] = $row1;
				
			}
			
			$xml_wyjazdy= new SimpleXMLElement("<?xml version=\"1.0\"?><wyjazdy></wyjazdy>");
			array_to_xml($xml_array1,$xml_wyjazdy);
			//tworzymy plik
			$xml_file1 = $xml_wyjazdy->asXML('../files/xml/wyjazdy.xml');
			
			echo "<p><h1>Tablica</h1></p>";
			echo "<p><hr><prev>";
			print_r($xml_array1);
			echo "<hr></prev></p>";
			echo "<p><h1>XML</h1></p>";
			print_r($xml_wyjazdy->asXML());
			
			
			
		}
		
		
		
		include '../database/db_1.php';
			
			
			
			
			
			
								$query = "SELECT COUNT(*) as all_posts FROM Wyjazdy";
								$result = mysql_query($query) or die (mysql_error());
								
								$row = mysql_fetch_array($result);
								extract($row);
								
								$onpage = 2; //ilość wyśiwtlen na stronę
								$navnum = 3; //ilość wyświetlanych numerów stron, ze względów estetycznych niech będzie to liczba nieparzysta
								$allpages = ceil($all_posts/$onpage); //wszysttkie strony to zaokrąglony w górę iloraz wszystkich postów i ilości postów na stronę
        
								//sprawdzamy poprawnośc przekazanej zmiennej $_GET['page'] zwróć uwage na $_GET['page'] > $allpages
								if(!isset($_GET['page']) or $_GET['page'] > $allpages or !is_numeric($_GET['page']) or $_GET['page'] <= 0){
								$page = 1;
								}else{
								$page = $_GET['page'];
								}
								$limit = ($page - 1) * $onpage; //określamy od jakiego uzytkownika będziemy pobierać informacje z bazy danych
								$teraz = Date("m");//aktualny miesiac
								//zmiene filtrowane
									
									
								
									$query = "SELECT Data, Miejscowosc, Opis, Zastep, kierowca.Imie AS kI, kierowca.Nazwisko AS kN, dowodca.Imie AS dI, dowodca.Nazwisko AS dN, przod_rot_I.Imie AS pr1I, przod_rot_I.Nazwisko AS pr1N, pom_przod_rot_I.Imie AS ppr1I, pom_przod_rot_I.Nazwisko AS ppr1N, przod_rot_II.Imie AS pr2I, przod_rot_II.Nazwisko AS pr2N, pom_przod_rot_II.Imie AS ppr2I, pom_przod_rot_II.Nazwisko AS ppr2N, Marka, Model, Typ_pojazdu.Nazwa AS Typ_pojazdu, Kryptonim
							FROM Wyjazdy JOIN Zastep ON Zastep.ID = Zastep
							LEFT JOIN Druhowie kierowca ON kierowca.ID = Zastep.Kierowca
							LEFT JOIN Druhowie dowodca ON dowodca.ID = Zastep.Dowodca
							LEFT JOIN Druhowie przod_rot_I ON przod_rot_I.ID = Zastep.Przod_rot_I
							LEFT JOIN Druhowie pom_przod_rot_I ON pom_przod_rot_I.ID = Zastep.Pom_przod_rot_I
							LEFT JOIN Druhowie przod_rot_II ON przod_rot_II.ID = Zastep.Przod_rot_II
							LEFT JOIN Druhowie pom_przod_rot_II ON pom_przod_rot_II.ID = Zastep.Pom_przod_rot_II
							JOIN Pojazdy ON ID_Pojazdu = Pojazd
							JOIN Typ_pojazdu ON Typ_pojazdu.ID = Pojazdy.Typ
							ORDER BY Data DESC LIMIT $limit, $onpage";
									
								echo "<center>";
								
								$result = mysql_query($query) or die (mysql_error());
								
								while($row = mysql_fetch_array($result)){ 
								
								
								echo "<p><strong>Data wyjazdu:</strong> ".$row['Data']."  <strong>Miejscowosc:</strong> ".$row['Miejscowosc']."  <strong>Opis:</strong> ".$row['Opis']."</p>";
								echo "<p><strong>Zastep nr:</strong> ".$row['Zastep']." <strong>Specjalizacja:</strong> text</p>";
								echo "<p><strong>Dowodca sekcji:</strong> ".$row['dI']." ".$row['dN']."</p>";
								echo "<p><strong>Kierowca:</strong> ".$row['kI']." ".$row['kN']."</p>";
								echo "<p><strong>Przodownik roty I: </strong>".$row['pr1I']." ".$row['pr1N']."</p>";
								echo "<p><strong>Pomocnik przodownika roty I:</strong> ".$row['ppr1I']." ".$row['ppr1N']."</p>";
								echo "<p><strong>Przodownik roty II:</strong> ".$row['pr2I']." ".$row['pr2N']."</p>";
								echo "<p><strong>Pomocnik przodownika roty I:</strong> ".$row['ppr2I']." ".$row['ppr2N']."</p>";
								echo "<p><strong>Samochod:</strong> ".$row['Marka']." ".$row['Model']."<strong> Typ: </strong>".$row['Typ_pojazdu']." <strong>Kryptonim: </strong>".$row['Kryptonim']."</p>";
								echo "<hr>";
								
									
										
								 } 
								
								
								
									
								//zabezpieczenie na wypadek gdyby ilość stron okazała sie większa niż ilośc wyświetlanych numerów stron
								if($navnum > $allpages){
								$navnum = $allpages;
								}
        
								//ten fragment może być trudny do zrozumienia
								//wyliczane są tu niezbędne dane do prawidłowego zbudowania pętli
								//zmienne są bardzo opisowę więc nie będę ich tłumaczyć
								$forstart = $page - floor($navnum/2);
								$forend = $forstart + $navnum;
        
								if($forstart <= 0){ $forstart = 1; }
        
								$overend = $allpages - $forend;
        
								if($overend < 0){ $forstart = $forstart + $overend + 1; }
        
								//ta linijka jest ponawiana ze względu na to, że $forstart mogła ulec zmianie
								$forend = $forstart + $navnum;
								//w tych zmiennych przechowujemy numery poprzedniej i następnej strony
								$prev = $page - 1;
								$next = $page + 1;
        
								//nie wpisujemy "sztywno" nazwy skryptu, pobieramy ja od serwera
								$script_name = $_SERVER['SCRIPT_NAME'];
        
								//ten fragment z kolei odpowiada za wyślwietenie naszej nawigacji
								echo "<div id=\"nav\"><center><table><tr>";
								if($page > 1) echo "<td><a href=\"".$script_name."?page=".$prev."\">Cofnij</a></td>";
								if ($forstart > 1) echo "<td><a href=\"".$script_name."?page=1\">[1]</a></td>";
								if ($forstart > 2) echo "<td>...</td>";
								for($forstart; $forstart < $forend; $forstart++){
								if($forstart == $page){
								echo "<td class=\"current\">";
								}else{
								echo "<td>";
								}
								echo "<a href=\"".$script_name."?page=".$forstart."\">[".$forstart."]</a></td>";
								}
								if($forstart < $allpages) echo "<td>...</td>";
								if($forstart - 1 < $allpages) echo "<td><a href=\"".$script_name."?page=".$allpages."\">[".$allpages."]</a></td>";
								if($page < $allpages) echo "<td><a href=\"".$script_name."?page=".$next."\">Dalej</a></td>";
								echo "</tr></table></center></div><div class=\"clear\">";
			

								$sql = "SELECT Data, Miejscowosc, Opis, Zastep, kierowca.Imie AS kI, kierowca.Nazwisko AS kN, dowodca.Imie AS dI, dowodca.Nazwisko AS dN, przod_rot_I.Imie AS pr1I, przod_rot_I.Nazwisko AS pr1N, pom_przod_rot_I.Imie AS ppr1I, pom_przod_rot_I.Nazwisko AS ppr1N, przod_rot_II.Imie AS pr2I, przod_rot_II.Nazwisko AS pr2N, pom_przod_rot_II.Imie AS ppr2I, pom_przod_rot_II.Nazwisko AS ppr2N, Marka, Model, Typ_pojazdu.Nazwa AS Typ_pojazdu, Kryptonim
							FROM Wyjazdy JOIN Zastep ON Zastep.ID = Zastep
							LEFT JOIN Druhowie kierowca ON kierowca.ID = Zastep.Kierowca
							LEFT JOIN Druhowie dowodca ON dowodca.ID = Zastep.Dowodca
							LEFT JOIN Druhowie przod_rot_I ON przod_rot_I.ID = Zastep.Przod_rot_I
							LEFT JOIN Druhowie pom_przod_rot_I ON pom_przod_rot_I.ID = Zastep.Pom_przod_rot_I
							LEFT JOIN Druhowie przod_rot_II ON przod_rot_II.ID = Zastep.Przod_rot_II
							LEFT JOIN Druhowie pom_przod_rot_II ON pom_przod_rot_II.ID = Zastep.Pom_przod_rot_II
							JOIN Pojazdy ON ID_Pojazdu = Pojazd
							JOIN Typ_pojazdu ON Typ_pojazdu.ID = Pojazdy.Typ";
			
			
			
								ToXml($sql);
								ToJson($sql);
			
?>
		
	
</body>
</html>