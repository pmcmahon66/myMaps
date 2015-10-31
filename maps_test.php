<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>jQuery Search Autocomplete</title>
 
    <style type="text/css" title="currentStyle">
                @import "css/grid_sytles.css";
                @import "css/themes/smoothness/jquery-ui-1.8.4.custom.css";
    </style>
    
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    
        <!-- Custom styles for this template -->
    <link href="mapstyle.css" rel="stylesheet">
 
    <!-- jQuery libs -->
    <script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script  type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
 
    <script  type="text/javascript" src="js/jquery-search.js"></script>
 
    <script type="text/javascript">
function load() {
    // Define location of map and info windows
var latLng = new google.maps.LatLng(55, -8);

// Some options and start up maps
var myOptions = { center: latLng, zoom: 8, mapTypeId: google.maps.MapTypeId.ROADMAP };
var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

var infoWindow = new google.maps.InfoWindow({
    // Change this depending on the name of your PHP file
      downloadUrl("maps.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var stop = markers[i].getAttribute("stop");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + stop + "</b> <br/>";
//          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
//            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
}).open(map);
      }
  }

function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
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