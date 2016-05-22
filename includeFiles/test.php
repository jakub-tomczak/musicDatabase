<?php
header('Content-type: application/xml; charset="utf-8"');
require("includeFiles/functions.php");
$sQuery = "SELECT * FROM `utwory` ";
$sDatabase = "muzyka";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){

}


echo '<?xml version="1.0" encoding="utf-8"?>';


while($row = mysqli_fetch_array($sMYSQL_Result)) {
  echo '<utwor>'.
   '<lp>'.($iResults+1).'</lp>'.
   'img'. $row['img'].'</img>'.
  '<nazwa>'. $row['nazwa'].'</nazwa>'.
  '<wykonawca>'. $row['wykonawca'].'</wykonawca>'.
  '<plyta>' . $row['plyta'].'</plyta>' .
  '<rok>' . $row['rok'].'</rok>'.
  '</utwor>';
}

?>