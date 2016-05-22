<div id="menus">
    <div id="menubar" class="mainmenus"
         onclick="showMenuItem('items');">
         Menu
         <a onclick="showMenuItem('items');"><img id="arrow" src="/projekt/imgs/down.png" alt="rozwiń" style="max-height:inherit; height:0.7em;" title="rozwiń" onclick="showMenuItem('items');" /></a>
    </div>
    <div id="items" class="menuitems"  >
     <!-- <div onclick="window.location.assign('index.php')" class="menuItem"><img src="/projekt/imgs/main.png" alt="dodaj utwór"  />Główna</div>-->
      <div onclick="Add();" class="menuItem"><img src="/projekt/imgs/add.png" alt="dodaj utwór"  />Dodaj utwór </div>
      <div onclick="window.location.assign('includeFiles/ExportToCSV.php');" class="menuItem"><img src="/projekt/imgs/file_csv.png" alt="CSV"  />Eksportuj do CSV </div>
      <div onclick="window.location.assign('includeFiles/ExportToXML.php');" class="menuItem"><img  src="/projekt/imgs/file_xml.png" alt="XML" />Eksportuj do XML </div>
    </div>
</div>
<?php //onclick="window.location.assign('index.php');hideMe('items');"?>