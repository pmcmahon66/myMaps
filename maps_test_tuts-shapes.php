<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      name: {
        icon: 'http://localhost/myfolio/map_icon.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(55, -8),
        zoom: 8,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("route_shapes.php", function(data) {
        var xml = data.responseXML;
        var routes = xml.documentElement.getElementsByTagName("route");
        for (var i = 0; i < routes.length; i++) {
//          var busrouteCoordinates = routes[i].getAttribute("stop");
//          var route = markers[i].getAttribute("address");
//          var type = markers[i].getAttribute("type");
          var busrouteCoordinates = new google.maps.LatLng(
              parseFloat(routes[i].getAttribute("lat")),
              parseFloat(routes[i].getAttribute("lng")));
//          var html = "<b>" + name + "</b> <br/>";//+ address
//          var icon = customIcons[name] || {};
   var busPath = new google.maps.Polyline({
    path: busrouteCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 5
  });
//         for (var i = 0; i <.document)
//          var busrouteCoordinates = [
//    {lat: 54.9538024330701, lng: -7.72931506865457},
//    {lat: 54.9540175027054, lng: -7.72906383992521},
//    {lat: 54.9540442124161, lng: -7.72895437997576},
//    {lat: 54.9540256517662, lng: -7.72868911004762}
//  ];

  busPath.setMap(map);
  
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

//    function bindInfoWindow(marker, map, infoWindow, html) {
//      google.maps.event.addListener(marker, 'click', function() {
//        infoWindow.setContent(html);
//        infoWindow.open(map, marker);
//      });
//    }

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

    //]]>

  </script>

  </head>

  <body onload="load()">
    <div id="map" style="width: 800px; height: 800px"></div>
  </body>

</html>