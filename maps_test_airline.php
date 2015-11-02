<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Read XML Files with Google Maps</title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4Eg5R8ZRHnASzTEkqkJeZXNhuafQEUfM" type="text/javascript"></script>
<!--        <script src="markermanager.js"></script>-->

    <script type="text/javascript">
    //<![CDATA[
    var customIcons = {
      stop: {
        icon: 'http://localhost/myfolio/map_icon.png'
      }
    };
            function initialize() {

                getAjaxData();
//                handle = setInterval(getAjaxData, 5000);

            }
            function getAjaxData()
            {
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = showXMLData;
                xmlhttp.open("GET", "fetch2.php", true);
                xmlhttp.send();
            }

            function showXMLData()
            {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    var myLatlng = new google.maps.LatLng(55, -8);
                    var mapOptions =
                            {
                                zoom: 9,
                                center: myLatlng
                            }

                    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                    var data = JSON.parse(xmlhttp.responseText);

                    console.log(data.markers.length);
                    for (var i = 0; i < data.markers.length; i++)
                    {
                        var mapPosition = new google.maps.LatLng(data.markers[i].stop_lat, data.markers[i].stop_lon);

                        console.log(data.markers[i].track);
                        //var image = 'images/plane.png';
                        var icon = customIcons[stop_id] || {};
                        var marker = new google.maps.Marker({
                            position: mapPosition,
                            map: map,
                            icon: icon.icon,
//                            icon: {
//                                path: google.maps.SymbolPath.FORWARD_OPEN_ARROW,
//                                scale: 4,
////                                rotation: parseInt(data.markers[i].track)
//                            },
                            title: data.markers[i].stop_name
                        });
                    }
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);



        </script>
    </head>
    <body onload="initialize()">
        <div id="map_canvas" style="width: 800px; height: 800px"></div>
        <div id="message"></div>
    </body>
</html>

