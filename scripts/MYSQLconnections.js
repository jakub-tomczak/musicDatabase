//aktualizacja wynikow
function UpdateResults(order)
{
var ajaxObject;
try{
 ajaxObject = new ActiveXObject('Microsoft.XMLHTTP');
} catch (ex)
{ 
  try {
ajaxObject= new XMLHttpRequest();
} catch (e3)
{
ajaxObject=false;
}
}
ajaxObject.onreadystatechange = function(){
var warstwa = document.getElementById('wyniki');
if(ajaxObject.readyState == 4){ // zakończenie
  if(ajaxObject.status == 200)
    warstwa.innerHTML = ajaxObject.responseText;
  else
    warstwa.innerHTML = "Nie udało się pobrać wyników z bazy!<br/> Kod błędu: "+ ajaxObject.status;
}
};
ajaxObject.open('GET','includeFiles/fetchResultMySQL.php?ordered='+order);
ajaxObject.send(null);
}

//usuwanie rekordow
function Delete(id)
{
var ajaxObject;
try{
 ajaxObject = new ActiveXObject('Microsoft.XMLHTTP');
} catch (ex)
{ 
  try {
ajaxObject= new XMLHttpRequest();
} catch (e3)
{
ajaxObject=false;
}
}
ajaxObject.onreadystatechange = function(){
var warstwa = document.getElementById('wyniki');
if(ajaxObject.readyState == 4){ // zakończenie
  if(ajaxObject.status == 200)
    UpdateResults();
  else
    warstwa.innerHTML = "Nie udało się usunąć rekordu z bazy!<br/> Kod błędu: "+ ajaxObject.status;
}
};
ajaxObject.open('GET','delete.php?id='+id);
ajaxObject.send(null);
}

//dodawanie rekordow
function Add()
{
var h=window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
if(h>400){
  	document.getElementById("additionalDiv").style.display = "block";
}else{
	window.close();
	window.open("add.php");
	
	return;
}

var ajaxObject;
try{
 ajaxObject = new ActiveXObject('Microsoft.XMLHTTP');
} catch (ex)
{ 
  try {
ajaxObject= new XMLHttpRequest();
} catch (e3)
{
ajaxObject=false;
}
}
ajaxObject.onreadystatechange = function(){
var warstwa = document.getElementById("textDiv");
if(ajaxObject.readyState == 4){ // zakończenie
  if(ajaxObject.status == 200){
    UpdateResults();
    warstwa.innerHTML = ajaxObject.responseText;
    }
  else
    warstwa.innerHTML = "Nie udało się dodać rekordu do bazy!<br/> Kod błędu: "+ ajaxObject.status;
}
};
ajaxObject.open('GET','includeFiles/addForm.html');
ajaxObject.send(null);
}

//edytowanie rekordow
function Edit(id)
{
var h=window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
if(h>400){
  	document.getElementById("additionalDiv").style.display = "block";
}else{
	window.open('edit.php?sId='+id+'&all=y');
	return;
}

var ajaxObject;
try{
 ajaxObject = new ActiveXObject('Microsoft.XMLHTTP');
} catch (ex)
{ 
  try {
ajaxObject= new XMLHttpRequest();
} catch (e3)
{
ajaxObject=false;
}
}
ajaxObject.onreadystatechange = function(){
var warstwa = document.getElementById("textDiv");
if(ajaxObject.readyState == 4){ // zakończenie
  if(ajaxObject.status == 200){
    UpdateResults();
    warstwa.innerHTML = ajaxObject.responseText;
    }
  else
    warstwa.innerHTML = "Nie udało się edytować rekordu!<br/> Kod błędu: "+ ajaxObject.status;
}
};
ajaxObject.open('GET','edit.php?sId='+id);
ajaxObject.send(null);
}


