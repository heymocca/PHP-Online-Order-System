<!DOCTYPE html>
<html>
  <head>
    <title>Simple click event</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>

  </head>
  <body>
    <div id="map"></div>
    <script>
function initMap() {
  var myLatlng = {lat: -36.880205, lng: 174.707361}; 

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: myLatlng
  });
  
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h3 id="firstHeading" class="firstHeading">Welcome To Crazy Hats</h3>'
      '</div>';
  var infowindow = new google.maps.InfoWindow({
	  content: contentString
	  });
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: 'Rainbow Team Evaluation'
  });

  map.addListener('center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  marker.addListener('click', function() {
    map.setZoom(13);
    map.setCenter(marker.getPosition());
	infowindow.open(map,marker);
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcIRRvkiQkZ-3rst2RaNtpXDa1dFM443c&signed_in=true&callback=initMap" async defer>
    </script>
  </body>
</html>
