<?php
require("functions.php");
if(isset($_GET['ordered']))
{
	$sOrdered=mysql_real_escape_string(htmlentities($_GET['ordered']));
	switch($sOrdered){
		case 'idA':
			$sOrdered=" `utwory`.`id` ASC ";
			$sImg="id";
			$sDir="downSort.png";
			break;
		case 'idD':
			$sOrdered=" `utwory`.`id` DESC ";
			$sImg="id";
			$sDir="upSort.png";
			break;
		case 'namA':
			$sOrdered=" `utwory`.`nazwa` ASC ";
			$sImg="nazwa";
			$sDir="downSort.png";
			break;
		case 'namD':
			$sOrdered=" `utwory`.`nazwa` DESC ";
			$sImg="nazwa";
			$sDir="upSort.png";
			break;
		case 'wykA':
			$sOrdered=" `utwory`.`wykonawca` ASC ";
			$sImg="wykonawca";
			$sDir="downSort.png";
			break;
		case 'wykD':
			$sOrdered=" `utwory`.`wykonawca` DESC ";
			$sImg="wykonawca";
			$sDir="upSort.png";
			break;
		case 'plyA':
			$sOrdered=" `utwory`.`plyta` ASC ";
			$sImg="plyta";
			$sDir="downSort.png";
			break;
		case 'plyD':
			$sOrdered=" `utwory`.`plyta` DESC ";
			$sImg="plyta";
			$sDir="upSort.png";
			break;
		case 'rokA':
			$sOrdered=" `utwory`.`rok` ASC ";
			$sImg="rok";
			$sDir="downSort.png";
			break;
		case 'rokD':
			$sOrdered=" `utwory`.`rok` DESC ";
			$sImg="rok";
			$sDir="upSort.png";
			break;
		default:
			$sOrdered=" `utwory`.`id` ASC ";
			$sImg="id";
			$sDir="downSort.png";
			break;
			
	}
}
else 
{
			$sOrdered=" `utwory`.`id` ASC ";
			$sImg="id";
			$sDir="downSort.png";
}

$sQuery = "SELECT * FROM `utwory` ORDER BY  $sOrdered  LIMIT 0, 30 ";
$sDatabase = "muzyka";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){

if($sDir=="upSort.png")
	$sLit='A"';
else
	$sLit='D"';

$sImgSrc1 = "<img onclick='UpdateResults(";
$sImgSrc2 = $sLit.");' class='sort' src='imgs/".$sDir."'/>";
$sImgSrcNormal1 = "<img onclick='UpdateResults(";
$sImgSrcNormal2 = $sLit.");' class='sort' src='imgs/down.png'/>";
// wyświetlanie wyników
echo "<table id='mysqlResults' >
	<tr>
		<th>lp"; if($sImg=="id") echo $sImgSrc1.'"id'.$sImgSrc2; else echo $sImgSrcNormal1.'"id'.$sImgSrcNormal2; echo "</th>
		<th>Okładka</th>
		<th>Nazwa"; if($sImg=="nazwa") echo $sImgSrc1.'"nam'.$sImgSrc2; else echo $sImgSrcNormal1.'"nam'.$sImgSrcNormal2; echo "</th>
		<th>Wykonawca"; if($sImg=="wykonawca") echo $sImgSrc1.'"wyk'.$sImgSrc2; else echo $sImgSrcNormal1.'"wyk'.$sImgSrcNormal2; echo "</th>
		<th>Płyta"; if($sImg=="plyta") echo $sImgSrc1.'"ply'.$sImgSrc2; else echo $sImgSrcNormal1.'"ply'.$sImgSrcNormal2; echo "</th>
		<th>Rok"; if($sImg=="rok") echo $sImgSrc1.'"rok'.$sImgSrc2; else echo $sImgSrcNormal1.'"rok'.$sImgSrcNormal2; echo "</th>
		<th>edytuj wpis</th>
		<th>usuń wpis</th>
	</tr>
";
$iResults=0;
while($row = mysqli_fetch_array($sMYSQL_Result)) {
  echo "<tr>\n<td>";
  echo ($iResults+1)."</td>";
  $sImgPath = $row['img'];
  if($sImgPath=='')	$sImgPath='imgs/songsCovers/default.png';
  echo "<td><img style='width: 4em;height:4em;' src='" . $sImgPath."' alt='Okładka płyty'/></td>";
  echo "<td>" . $row['nazwa']."</td>";
  echo "<td>" . $row['wykonawca']."</td>";
  echo "<td>" . $row['plyta']."</td>";
  echo "<td>" . $row['rok']."</td>";
  echo "<td><img src='/projekt/imgs/edit.png' onclick=".'"'."Edit('".$row['md5']."')".'"'."></td>
 	   <td><img src='/projekt/imgs/delete.png' onclick=".'"'."Delete('".$row['md5']."')".'"'.">";
  echo "</td>\n</tr>";
  $iResults++;
}
echo "</table>";
if($iResults==0){
	echo "<div id='zeroResults'>Brak utworów!<br/>
	<input type='button' onclick='Add();' value='Dodaj utwór!' />
	</div>";
}
	}else{
		if($sMYSQL_Result===NULL)
			echo "Nie udało się połączyć z bazą! <br/>";
		if($sMYSQL_Result===false)
			echo "Nie udało się wykonać poleceniay! <br/>";
	}


//mysqli_close($sCon);


?>
