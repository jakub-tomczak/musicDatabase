     function showCloseTooltip(id, obj)
      {
        if(!obj || !id) return;
        
        var tooltipDiv = document.getElementById("tooltipDiv");
        if(!tooltipDiv) return;
        if(tooltipDiv.style.display == "none"){
        tooltipDiv.innerHTML = "podpowiedz!";
        tooltipDiv.style.display = "block";
        }
        else {
        tooltipDiv.style.display = "none";
        }
      }
      function ShowCloseAdd()
      {
      	var AddForm=document.getElementById("additionalDiv");
      	if(!AddForm) return ;
      	if(AddForm.style.display=="block")
      	AddForm.style.display="none";
      	else
      	AddForm.style.display="block";

      	
      }
	var RegExpNumbers = /[0-9]{2,4}/;
	var RegExpText = /[a-zA-Z0-9 ]{2,30}/; 
	function RexExpTest(tekst,pole){
		var poleBlad=pole+"Blad";
		
		var a = document.getElementById(poleBlad);
		var b = document.getElementById(pole);
		if(pole=="iRok")
			var uRegExp=RegExpNumbers;
		else
			var uRegExp = RegExpText;
		if(!uRegExp.exec(tekst))
		{
			a.style.color = "rgb(255,75,75)";
			a.innerHTML = "Błąd, wpisz poprawne dane!";
			b.style.background = "rgb(255,75,75)";
		}else{
			a.style.color = "rgb(75,255,75)";
			a.innerHTML = "OK :)";
			b.style.background = "rgb(75,255,75)";
		}
	}