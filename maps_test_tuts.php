<!DOCTYPE html>
  <html>
    <head>
      <title>test sandbox 8</title>

      <style type="text/css">
        #main {
          margin: 60px 15px; 
        }
        #map { 
          min-height: 600px; 
          min-width: 800px; 
        }
      </style>

              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM"
            type="text/javascript"></script>
      <script>
        // code to draw map
        var map;
        var col = '#FF0000';
        var link ;
        var latLng;
        var polypoints;

        function initialize() {
        var mapProp = {
                center : new google.maps.LatLng(53.40, -2.99),
                zoom : 12,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            };


        map = new google.maps.Map(document.getElementById("map"), mapProp);

         // data to show the links between locations, first part of lat & long denotes from location and second part is to location for a link.
         var links_data = [
         {"path":[{"lat":53.408123,"lng":-2.985655},{"lat":53.416366,"lng":-2.985655}]},
         {"path":[{"lat":53.416366,"lng":-2.985655},{"lat":53.408123,"lng":-3.038971}]},
         {"path":[{"lat":53.409477,"lng":-2.982685},{"lat":53.390648,"lng":-3.014405}]},
         {"path":[{"lat":53.390648,"lng":-3.014405},{"lat":53.409477,"lng":-2.982685}]},
         {"path":[{"lat":53.407086,"lng":-2.989244},{"lat":53.390648,"lng":-3.014405}]},
         {"path":[{"lat":53.390648,"lng":-3.014405},{"lat":53.407086,"lng":-2.989244}]},
         {"path":[{"lat":53.409477,"lng":-2.982685},{"lat":53.407086,"lng":-2.989244}]},
         {"path":[{"lat":53.409477,"lng":-2.982685},{"lat":53.409477,"lng":-2.982685}]}, 
         {"path":[{"lat":53.389557,"lng":-2.989244},{"lat":53.388615,"lng":-3.015866}]},   // line 9   same origin of line  13
         {"path":[{"lat":53.388615,"lng":-3.015866},{"lat":53.409477,"lng":-2.982685}]},   // line 10  same origin of line 13
         {"path":[{"lat":53.388615,"lng":-3.015866},{"lat":53.407086,"lng":-2.989244}]},   // line 11
         {"path":[{"lat":53.409477,"lng":-2.982685},{"lat":53.389557,"lng":-3.014986}]},   // line 12
         {"path":[{"lat":53.388615,"lng":-3.015866},{"lat":53.390648,"lng":-3.014405}]},   // line 13 
         {"path":[{"lat":53.389557,"lng":-3.014405},{"lat":53.389557,"lng":-3.022483}]},   // line 14 
         {"path":[{"lat":53.408123,"lng":-3.038971},{"lat":53.410152,"lng":-3.022483}]},   // line 15 repeat line 17 in reverse order 
         {"path":[{"lat":53.416366,"lng":-2.985655},{"lat":53.410152,"lng":-3.022483}]},   // line 16  repeat line 18 in reverse order
         {"path":[{"lat":53.410152,"lng":-3.022483},{"lat":53.408123,"lng":-3.038971}]},   // line 17
         {"path":[{"lat":53.410152,"lng":-3.022483},{"lat":53.416366,"lng":-2.985655}]}    // line 18
         ];

            // draw links
            for(var i = 0 ; i < links_data.length; i++)
            {
              latLng = links_data[i].path; 
              // polylines lat long array
              polypoints = [];
              for ( var j = 0; j < latLng.length; j++) {
                polypoints[j] = new google.maps.LatLng(
                        parseFloat(latLng[j].lat),
                        parseFloat(latLng[j].lng));

              }
             link = new google.maps.Polyline({
               path : polypoints,
               geodesic : true,
               strokeColor : col,
               strokeOpacity : 0.5,
               strokeWeight : 3,
               title : "test"
            });
            link.setMap(map);
           }
        }

         google.maps.event.addDomListener(window, 'load', initialize); 
      </script>
    </head>
    <body>
           <div id="map"></div>
     </body>
  </html>