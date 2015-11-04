// JavaScript Document
	
	// Example one of the route planner for google maps //
           var customIcons = {
      name: {
        icon: 'http://localhost/myfolio/map_icon.png'
      }
    };
    
  function routeA() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(54.2585, -6.959),
        zoom: 7,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("../wp-content/themes/customizer-child/scripts/maps1.xml", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("stop");
//          var address = markers[i].getAttribute("address");
//          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>";//+ address
          var icon = customIcons[name] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
      
      downloadUrl("../wp-content/themes/customizer-child/scripts/polylines/route2_polyline.xml", function(data) {
    var xml = data.responseXML;
    var routes = xml.documentElement.getElementsByTagName("route");
    var path = [];
    for (var i = 0; i < routes.length; i++) {
      var lat = parseFloat(routes[i].getAttribute("lat"));
      var lng = parseFloat(routes[i].getAttribute("lng"));
      var point = new google.maps.LatLng(lat,lng);
      path.push(point);
    }//finish loop

    var polyline = new google.maps.Polyline({
      path: path,
      geodesic : true,
      strokeColor: "#f48208",
      strokeOpacity: 1.0,
      strokeWeight: 4
    });
    polyline.setMap(map);

}); //end download url
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

    function doNothing() {
        
    }
    
    //Route from inishowen - Dublin/////////////////////////////
    function routeB() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(54.2585, -6.959),
        zoom: 7,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("../wp-content/themes/customizer-child/scripts/maps2.xml", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("stop");
//          var address = markers[i].getAttribute("address");
//          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>";//+ address
          var icon = customIcons[name] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
      
      downloadUrl("../wp-content/themes/customizer-child/scripts/polylines/route12_polyline.xml", function(data) {
    var xml = data.responseXML;
    var routes = xml.documentElement.getElementsByTagName("route");
    var path = [];
    for (var i = 0; i < routes.length; i++) {
      var lat = parseFloat(routes[i].getAttribute("lat"));
      var lng = parseFloat(routes[i].getAttribute("lng"));
      var point = new google.maps.LatLng(lat,lng);
      path.push(point);
    }//finish loop

    var polyline = new google.maps.Polyline({
      path: path,
      geodesic : true,
      strokeColor: "#f48208",
      strokeOpacity: 1.0,
      strokeWeight: 4
    });
    polyline.setMap(map);

}); //end download url
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

    function doNothing() {
        
    }