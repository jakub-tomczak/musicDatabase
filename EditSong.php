<?php 
if(!isset($_POST['wyslano']) || $_POST['sNazwa']==''){
	header("Location: index.php");
	die();
	}
if(isset($_GET['all']) and $_GET['all']=='y'){
	require("includeFiles/headers.html"); 
	require("includeFiles/addHTML1.html");
}


require("includeFiles/functions.php");
	$sId=mysql_real_escape_string(htmlentities($_POST['sId']));
	$sNazwa=mysql_real_escape_string(htmlentities($_POST['sNazwa']));
	$sWykonawca=mysql_real_escape_string(htmlentities($_POST['sWykonawca']));
	$sPlyta=mysql_real_escape_string(htmlentities($_POST['sPlyta']));
	$iRok=mysql_real_escape_string(htmlentities($_POST['iRok']));
	$sMd5=md5($sNazwa.$sWykonawca.$iPlyta.$iRok);
	$sOldMd5=mysql_real_escape_string(htmlentities($_POST['sOldMd5']));
/* krótka weryfikacja danych*/
if(strlen($sId)>50)
	$sId = 'brak';
if(strlen($sNazwa)>=30)
	$sNazwa = 'brak';
if(strlen($sWykonawca)>=30)
	$sWykonawca = 'brak';
if(strlen($Plyta)>=30)
	$sPlyta = 'brak';
if(strlen($iRok)>=30)
	$iRok = 'brak';
if(strlen($sOldMd5)>50)
	$sOldMd5 = 'brak';
/* wysyłanie zdjęcia */
if($_FILE['file']['name']!=''){
$sUploadPhotoState=uploadImg($sMd5);
if($sUploadPhotoState == false || $sUploadPhotoState==null)
	$sZdjecie="imgs/songsCovers/default.png";
		if($sUploadPhotoState==false)
			{
				echo "Niepoprawne zdjęcie! Sprawdź format (gif, jpeg, jpg, png) oraz rozmiar (max. 5MB)<br/>";
			}
		else if($sUploadPhotoState==null)
		{
			echo "Błąd podczas przetwarzania zdjęcia!<br/>";
		}
}else{
	$sZdjecie="imgs/songsCovers/".$sOldMd5;
}
$sDatabase = "muzyka";
$sQuery="UPDATE utwory SET nazwa='$sNazwa', wykonawca='$sWykonawca', plyta='$sPlyta', rok='$iRok', md5='$sMd5', img='$sZdjecie'
WHERE id='$sId' ";
echo $sQuery."<br/>";

$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){
	echo "<div id='songAdded'>
	Dodano utwór: <b>$sNazwa</b><br/>
	Wykonawca: $sWykonawca <br/>
	Płyta: $sPlyta<br/>
	Rok: $iRok
	<br/></div>
		<input type='button' onclick='window.close()' value='Zamknij okno!' />
	<input type='button' onclick='window.location.replace(".'"/projekt/index.php"'.");' value='Zamknij okno!' />

	<script>
	window.location.replace('/projekt/index.php');
	</script>
	\n";
	unset($_POST['wyslano']);
	}else{
	    if($result===NULL){
	    echo "Nie udało się połączyć z bazą MySQL: " . mysqli_connect_error()."<br/>";
	    }
	    if($result===false){
	    	echo "Nie udało się wykonać polecenia! <br/>";
	    }
		echo "\nZapisuje dane do pliku tekstowego!\n";
		$sDaneMysql=$sNazwa.";".$sWykonawca.";".$sPlyta.";".$iRok.";".$sZdjecie.";".$sMd5.";";
		saveInFile($sDaneMysql,'toMySQL.txt','a');
		}
		
require("includeFiles/addHTML2.html");	//koncowka dokumentu	
?>