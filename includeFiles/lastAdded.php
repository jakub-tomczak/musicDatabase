<?php
require("functions.php");
if(isset($_GET['idAdded'])){
$iId=mysql_real_escape_string(htmlentities($_GET['idAdded']));
$sDatabase = "muzyka";
$sQuery="SELECT * FROM utwory WHERE id='$iId'";


$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){
	$row = mysqli_fetch_assoc($sMYSQL_Result);
	echo '<div id="songAdded">
<h1>Dodano utwór:</h1>
<table>
<tr><td>Nazwa utworu:</td><td> '.$row['nazwa'].'</td></tr>
<tr><td>Wykonawca:</td><td> '.$row['wykonawca'].'</td></tr>
<tr><td>Nazwa płyty:</td><td> '.$row['plyta'].'</td></tr>
<tr><td>Rok:</td><td>'.$row['rok'].'</td></tr>';
if(empty($row['img']))
	$row['img'] = "/projekt/imgs/songsCovers/default.png";
echo '
<tr><td rowspan="2">Zdjęcie okładki:<img style="width: 4em;height:4em;" src="'.$row['img'].'"/></td></tr>
<tr><td><input type="button" onclick="document.getElementById('."'songAdded'".').style.display = '."'none'".';" value="OK" /></td></tr>
</form>
</table>
</div>
';
	
	
	}else{
	    if($result===NULL){
	    echo "Nie udało się połączyć z bazą MySQL: " . mysqli_connect_error()."<br/>";
	    }
	    if($result===false){
	    	echo "Nie udało się wykonać polecenia! <br/>";
	    }
		echo "\nZapisuje dane do pliku tekstowego!\n";
		$sDaneMysql=$sNazwa.";".$sWykonawca.";".$sPlyta.";".$iRok.";".$sZdjecie.";".$sMd5.";";
		saveInFile($sDaneMysql);
		}
}
?>