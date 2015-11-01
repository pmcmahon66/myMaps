<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>jQuery Search Autocomplete</title>
 
    <style type="text/css" title="currentStyle">
                @import "css/grid_sytles.css";
                @import "css/themes/smoothness/jquery-ui-1.8.4.custom.css";
    </style>
    
<!-- Load the Google Maps JS API. Your Google maps key will be rendered. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM"
            type="text/javascript"></script>
<script type="text/javascript">
  var geocoder;
  var map;
  var places;
  var markers = [];
  function initialize() {
  	// create the geocoder
  	geocoder = new google.maps.Geocoder();
    
    // set some default map details, initial center point, zoom and style
    var mapOptions = {
      center: new google.maps.LatLng(40.74649,-74.0094),
      zoom: 7,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    // create the map and reference the div#map-canvas container
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    // fetch the existing places (ajax) 
    // and put them on the map
    fetchPlaces();
  }
  // when page is ready, initialize the map!
  google.maps.event.addDomListener(window, 'load', initialize);
  // add location button event
  jQuery("form").submit(function(e){
  	// the name form field value
  	var name = jQuery("#place_name").val();
  	
  	// get the location text field value
  	var loc = jQuery("#location").val();
  	console.log("user entered location = " + loc);
  	geocoder.geocode( { 'address': loc }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      	// log out results from geocoding
      	console.log("geocoding results");
        console.log(results);
        
        // reposition map to the first returned location
        map.setCenter(results[0].geometry.location);
        
        // put marker on map
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
        bindInfoWindow(marker, map, infowindow, places[p].stop + "<br>" + places[p].geo_name);
		// not currently used but good to keep track of markers
		markers.push(marker);
        
        // preparing data for form posting
        var lat = results[0].geometry.location.lat();
        var lng = results[0].geometry.location.lng();
        var loc_name = results[0].formatted_address;
        // send first location from results to server as new location
        jQuery.ajax({
        	url : 'maps.php',
        	dataType : 'json',
        	type : 'POST',
        	data : {
        		name : stop,
        		latlng : lat + "," + lng,
        		geo_name : loc_name
        	},
        	success : function(response){
        		// success - for now just log it
        		console.log(response);
        	},
        	error : function(err){
        		// do error checking
        		alert("something went wrong");
        		console.error(err);
        	}
        });
      } else {
        alert("Try again. Geocode was not successful for the following reason: " + status);
      }
  	});
	
    e.preventDefault();
    return false;
  });
	// fetch Places JSON from /data/places
	// loop through and populate the map with markers
	var fetchPlaces = function() {
		var infowindow =  new google.maps.InfoWindow({
		    content: ''
		});
		jQuery.ajax({
			url : 'maps.php',
			dataType : 'json',
			success : function(response) {
				
				if (response.status == 'OK') {
					places = response.places;
					// loop through places and add markers
					for (p in places) {
						//create gmap latlng obj
						tmpLatLng = new google.maps.LatLng( places[p].geo[0], places[p].geo[1]);
						// make and place map maker.
						var marker = new google.maps.Marker({
						    map: map,
						    position: tmpLatLng,
						    title : places[p].stop + "<br>" + places[p].geo_name
						});
						bindInfoWindow(marker, map, infowindow, '<b>'+places[p].stop + "</b><br>" + places[p].geo_name);
						// not currently used but good to keep track of markers
						markers.push(marker);
					}
				}
			}
		})
	};
	// binds a map marker and infoWindow together on click
	var bindInfoWindow = function(marker, map, infowindow, html) {
	    google.maps.event.addListener(marker, 'click', function() {
	        infowindow.setContent(html);
	        infowindow.open(map, marker);
	    });
	} 
  
</script>
</head>
<body onload="load()">
 
<div id="container">
 
    <div id="dataTable">
 
        <div class="ui-grid ui-widget ui-widget-content ui-corner-all">
 
            <div class="ui-grid-header ui-widget-header ui-corner-top clearfix">
 
            
            <!-- Map wrapper for info window scroll bar bug -->
            <div id="map_canvas"></div><br><br>
            
          

        </div>
    </div>
    </div>
</div>
 
</body>
</html>