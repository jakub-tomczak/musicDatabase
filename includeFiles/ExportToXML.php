<?php
Header('Content-type: text/xml');
Header('Content-Disposition: attachment; filename="Baza_utwory.xml"');

require("functions.php");
$sQuery = "SELECT * FROM `utwory` ";
$sDatabase = "muzyka";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){

$iResults=0;
$xml = new SimpleXMLElement('<utwory></utwory>');
while($row = mysqli_fetch_array($sMYSQL_Result)) {
	$track = $xml->addChild("utwor");
    	$track->addChild('lp', ($iResults+1));
    	$track->addChild('img', $row['img']);
    	$track->addChild('nazwa', $row['nazwa']);
    	$track->addChild('wykonawca', $row['wykonawca']);
    	$track->addChild('plyta', $row['plyta']);
    	$track->addChild('rok', $row['rok']);
    	$iResults++;

}
print($xml->asXML());
} else{
		if($sMYSQL_Result===NULL)
			echo "Nie udało się połączyć z bazą! <br/>";
		if($sMYSQL_Result===false)
			echo "Nie udało się wykonać polecenia! <br/>";
}



?>