/* global google */

<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM"
            type="text/javascript"></script>
    <script type="text/javascript">
        // code to draw map
        var map;
        var col = '#FF0000';
        var link ;
        var latLng;
        var polypoints;

        function load() {
        var mapProp = {
                center : new google.maps.LatLng(55, -7),
                zoom : 8,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            };
        map = new google.maps.Map(document.getElementById("map"), mapProp);

// draw links
      downloadUrl("route_shapes.php", function(data) {
        var xml = data.responseXML;
        var routes = xml.documentElement.getElementsByTagName("route");
        for(var i = 0 ; i < routes.length; i++)
            {
              latLng = routes[i].path; 
              // polylines lat long array
              polypoints = [];
              for ( var j = 0; j < latLng.length; j++) {
                polypoints[j] = new google.maps.LatLng(
                        parseFloat(latLng[j].lat),
                        parseFloat(latLng[j].lng));

              }
              }
             link = new google.maps.Polyline({
               path : polypoints,
               geodesic : true,
               strokeColor : '#ff0000',
               strokeOpacity : 0.5,
               strokeWeight : 8,
               title : "test"
            });
            link.setMap(map);
            
           });
        }

//         google.maps.event.addDomListener(window, 'load', initialize); 

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

  </script>

  </head>

  <body onload="load()">
    <div id="map" style="width: 800px; height: 800px"></div>
  </body>

</html>