<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Read XML Files with Google Maps</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM" type="text/javascript"></script>
    <script src="markermanager.js"></script>
    
 <script>
     var map;
     
     function initialize () {  
      if (GBrowserIsCompatible()) {
         map = new GMap2(document.getElementById("map_canvas"));
         map.setCenter(new GLatLng(30.279, -97.700), 13);  
	 map.addControl(new GLargeMapControl());
         map.addControl(new GMapTypeControl());
         map.addMapType(G_PHYSICAL_MAP);
	 map.setMapType(G_PHYSICAL_MAP);
	 
	 addMarkersFromXML();
	 
      }
	 
      }
      
      function addMarkersFromXML(){
	   var batch = [];
	   mgr = new MarkerManager(map); 
      
	   var request = GXmlHttp.create();
	   request.open('GET', 'Landmarks.xml', true);
	   request.onreadystatechange = function() {
  	   if (request.readyState == 4 && request.status == 200) {
		var xmlDoc = request.responseXML;
		var xmlrows = xmlDoc.documentElement.getElementsByTagName("Row");
		
		for (var i = 0; i < xmlrows.length; i++) {
			var xmlrow = xmlrows[i];
			
			var xmlcellLongitude = xmlrow.getElementsByTagName("Longitude")[0];
			var xmlcellLatitude = xmlrow.getElementsByTagName("Latitude")[0];
			var point = new GLatLng(parseFloat(xmlcellLatitude.firstChild.data), parseFloat(xmlcellLongitude.firstChild.data));
			
			//get the building name
			var xmlcellBuildingName = xmlrow.getElementsByTagName("Building_Name")[0];
			var celltextBuildingName = xmlcellBuildingName.firstChild.data;
			
			//get the address
			var xmlcellAddress = xmlrow.getElementsByTagName("Address")[0];
			var celltextAddress = xmlcellAddress.firstChild.data;
			
			//get the ownership
			var xmlcellOwnership = xmlrow.getElementsByTagName("Ownership")[0];
			var celltextOwnership = xmlcellOwnership.firstChild.data;
			
			//get the date built
			var xmlcellDateBuilt = xmlrow.getElementsByTagName("Date_Built")[0];
			var celltextDateBuilt = xmlcellDateBuilt.firstChild.data;
			
			var htmlString = "Building Name: " + celltextBuildingName + "<br>" + "Address: " + celltextAddress + "<br>" + "Ownership: " + celltextOwnership + "<br>" + "Date Built: " + celltextDateBuilt;
			//var htmlString = 'yes'
			var marker = createMarker(point,htmlString);
			batch.push(marker);
			
		}
		
		mgr.addMarkers(batch,13);
		mgr.refresh();
		
  	  }
        }
	request.send(null);
	
      }
     
     function createMarker(point,html) {
           var marker = new GMarker(point);
           GEvent.addListener(marker, "click", function() {
             marker.openInfoWindowHtml(html);
           });
           return marker;
     }

    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 1350px; height: 800px"></div>
    <div id="message"></div>
  </body>
</html>

