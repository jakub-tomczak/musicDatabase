    function showMenuItem(id)
    {
      var menu = document.getElementById(id);
      if(!menu) return;
      var arrow = document.getElementById("arrow");
      if(menu.style.display=="block"){
        menu.style.display = "none";
                //menu.active = false;
        arrow.src="/projekt/imgs/down.png";
      }
      else{
        menu.style.display = "block";
        //menu.active = true;
        arrow.src="/projekt/imgs/up.png";

      }
    }

    function hideMe(menu){
    	var menu = document.getElementById(menu);
    	if(!menu) return;
    	
    	menu.style.display = 'none';
    //	menu.active = false;
    }
    
