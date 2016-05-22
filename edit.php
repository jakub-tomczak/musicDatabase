<?php
if(isset($_GET['all']) and $_GET['all']=='y')
	{
	require("includeFiles/editHTML1.html");
	$bHTML2=true;
	}else
	{
	$bHTML=false;
	}
	
require("includeFiles/functions.php");
$sId=mysql_real_escape_string(htmlentities($_GET['sId']));
$sQuery = "SELECT * FROM `utwory` where md5='$sId'";

$sDatabase = "muzyka";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){
$row = mysqli_fetch_assoc($sMYSQL_Result);
echo '
<h1>Edytuj utwór</h1>
<table>
<form method="POST" action="EditSong.php" id="formAddHTML" enctype="multipart/form-data">
<tr><td>Nazwa utworu:</td><td> <input type="text" name="sNazwa" onkeyup="RexExpTest(this.value,this.name);" value="'.$row['nazwa'].'" /><div id="sNazwaBlad"></div></td></tr>
<tr><td>Wykonawca:</td><td> <input type="text" name="sWykonawca" onkeyup="RexExpTest(this.value,this.name);" value="'.$row['wykonawca'].'"/><div id="sWykonawcaBlad"></div></td></tr>
<tr><td>Nazwa płyty:</td><td> <input type="text" name="sPlyta" onkeyup="RexExpTest(this.value,this.name);" value="'.$row['plyta'].'" /><div id="sPlytaBlad"></div></td></tr>
<tr><td>Rok:</td><td><input type="text" name="iRok" onkeyup="RexExpTest(this.value,this.name);" value="'.$row['rok'].'"/><div id="iRokBlad"></div></td></tr>';
if(empty($row['img']))
	$row['img'] = "imgs/songsCovers/default.png";
echo '
<tr><td rowspan="2">Zdjęcie okładki:<input type="file" name="file" /><img style="width: 4em;height:4em;" src="'.$row['img'].'"/></td></tr>
<tr><td rowspan="2"> (dozwolone formaty - <b>jpeg jpg pjpg gif png x-png</b>. Maksymalny rozmiar pliku <b>5MB</b>)</td></tr>
<tr style="this.display='."'none'".';"><td rowspan="2"><input type="hidden" name="wyslano" value="true"/><input type="hidden" name="sId" value="'.$row['id'].'"/><input type="hidden" name="sOldMd5" value="'.$row['md5'].'"/></tr></td>
<tr><td><input type="submit" value="Zapisz" ><input type="button" onclick="document.getElementById('."'additionalDiv'".').style.display = '."'none'".';" value="Anuluj" /></td></tr>
</form>
</table>
';

	}else{
		if($sMYSQL_Result===NULL)
			echo "Nie udało się połączyć z bazą! <br/>";
		if($sMYSQL_Result===false)
			echo "Nie udało się wykonać polecenia! <br/>";
	}
if($bHTML){
	require("includeFiles/editHTML2.html");
	}



?>
