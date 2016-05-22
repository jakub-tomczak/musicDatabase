<?php require("includeFiles/headers.html"); ?>

<title>Muzyczna Baza</title>
</head>
<body onload="UpdateResults('idA');">


<?php require("includeFiles/topMenu.php"); ?>
<div id="mainbody" onclick="hideMe('items');">

<h1>"Muzyczna baza"</h1>

<!-- wyniki z bazy-->
<div id="wyniki">

</div>

<!--warstwa do edycji, dodawania, podpowiedzi -->
<div id="additionalDiv">
	<div id="transparentDiv"  onclick="document.getElementById('additionalDiv').style.display = 'none';"></div>
	<div id="textDiv" >

	</div>
</div>

<!--koniec mainbody -->
</div>
</body>
</html>
