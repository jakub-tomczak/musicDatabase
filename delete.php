<?php
require('includeFiles/functions.php');
$sId = mysql_real_escape_string(htmlentities($_GET['id']));
$sDatabase = 'muzyka';
$sQuery="DELETE FROM utwory WHERE md5='$sId'";
$sMYSQL_Result = databaseOperations($sQuery,$sDatabase);
if($sMYSQL_Result!==null && $sMYSQL_Result!=false){
	//mysqli_close($sCon);
	}else{
	    if($result===NULL){
	    echo 'Nie udało się połączyć z bazą MySQL: ' . mysqli_connect_error();
	    }
	    if($result==false){
	    	echo 'Nie udało się wykonać polecenia! <br/>';
	    }
		}
?>
