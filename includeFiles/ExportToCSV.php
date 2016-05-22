<?php
Header('Content-type: text/csv');
Header('Content-Disposition: attachment; filename="Baza_utwory.csv"');

require("functions.php");
$sQuery = "SELECT * FROM `utwory` ";
$sDatabase = "muzyka";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){

$iResults=1;


while($row = mysqli_fetch_array($sMYSQL_Result)) {
		echo $iResults.','.$row['img'].','.$row['nazwa'].','.$row['wykonawca'].','.$row['plyta'].','.$row['rok'].";\n";
    	$iResults++;

} 
}else{
		if($sMYSQL_Result===NULL)
			echo "Nie udało się połączyć z bazą! <br/>";
		if($sMYSQL_Result===false)
			echo "Nie udało się wykonać polecenia! <br/>";
}


?>