<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<?php require("styles/styleList.html"); ?>
<script src="/projekt/scripts/menu.js"></script>
<script src="/projekt/scripts/scripts.js"></script>
<link rel="shortcut icon" href="/projekt/imgs/icon.png"> 
</head>
<title>Muzyczna Baza - dodaj utwór</title>
</head>
<body>
<?php require("includeFiles/topMenu.php"); ?>
<div id="mainbody" onclick="hideMe('items');">
<?php
require("includeFiles/addForm.html");
?>
</body>
</html>