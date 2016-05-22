<?php
/* do pliku addXXX.php - odbiór danych i połączenie z bazą */
	$sNazwa=mysql_real_escape_string(htmlentities($_POST['sNazwa']));
	$sWykonawca=mysql_real_escape_string(htmlentities($_POST['sWykonawca']));
	$sPlyta=mysql_real_escape_string(htmlentities($_POST['sPlyta']));
	$iRok=mysql_real_escape_string(htmlentities($_POST['iRok']));


$sMd5=md5($sNazwa.$sWykonawca);	

/* wysyłanie zdjęcia 
if(uploadImg($sMd5) == false || uploadImg($sMd5)==null)
	$sZdjecie="imgs/songsCovers/default.png";
		if(uploadImg($sMd5)==false)
			echo "Niepoprawne zdjęcie! Sprawdź format (gif, jpeg, jpg, png) oraz rozmiar (max. 5MB)<br/>";
		else if(uploadImg($sMd5)==null)
			echo "Błąd podczas przetwarzania zdjęcia!<br/>";
else
	$sZdjecie="imgs/songsCovers/".$sMd5;
*/
$sDatabase = "muzyka";
$sQuery="INSERT INTO utwory (nazwa,wykonawca,plyta,rok,img,md5)
VALUES ( '$sNazwa', '$sWykonawca','$sPlyta','$iRok','$sZdjecie','$sMd5')";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
?>