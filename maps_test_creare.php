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

</head>
<body>
 <script type="text/javascript">
  function initialise() {
    myLatlng = new google.maps.LatLng(54.559323,-3.321304);
    mapOptions = {
        zoom: 5,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }
    geocoder = new google.maps.Geocoder();
    infoWindow = new google.maps.InfoWindow;
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
     
    xmlUrl = "inc/markers.xml";
     
    loadMarkers();
     
}
 
google.maps.event.addDomListener(window, 'load', initialise);   
  
</script>
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