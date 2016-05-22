<?php
function databaseOperations($sQuery,$sDatabase){
//połączenie z bazą
$sCon=mysqli_connect("localhost","root","root",$sDatabase);
//$sCon=mysqli_connect("mysql.hostinger.pl","u709342116_kuba","@kubatomczak12!","u709342116_baza");

if (mysqli_connect_errno()) {
  return null;
}else{
  return mysqli_query($sCon,$sQuery);
}

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "Connected!";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


}
function saveInFile($sText,$sFile,$sHandle){
$fiPlik=fopen("TxtFiles/".$sFile, $sHandle);	//można dopisać coś do pliku
fputs($fiPlik, $sText);
fclose($fiPlik);
}
function uploadImg($sName){
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    return none;
  } else {
    mkdir("imgs/songsCovers/");
    if (file_exists("imgs/songsCovers/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "imgs/songsCovers/" . $sName);
      echo "Stored in: " . "imgs/songsCovers/" . $_FILES["file"]["name"];
      echo "<img src='". "imgs/songsCovers/" . $_FILES["file"]["name"]."' >";
      return  $_FILES["file"]["name"];
    }
  }
} else {
  return false;
}
}
?>