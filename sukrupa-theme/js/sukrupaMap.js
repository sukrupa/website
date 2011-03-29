function initSukrupaMap(mapCanvasId) {
    var infoWindowContent =
"<div id='mapInfoDiv'>" +
"    #15, G.R.Layout, Cholanayakanahalli,<br />" +
"    R.T.Nagar<br />" +
"    Bangalore 560 032 INDIA<br />" +
"    (Near Rajiv Gandhi Dental College)" +
"</div>";

    var sukrupaMarkerPosition = new google.maps.LatLng(13.032656,77.596478);
    var mapCenter = new google.maps.LatLng(13.038801981588785, 77.59755088360589);
    
    
    var mapOptions = {
      zoom: 15,
      center: mapCenter,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControl: false,
      streetViewControl: false,
      mapTypeControl: false, 
      scrollwheel: false
    }
    var map = new google.maps.Map(document.getElementById(mapCanvasId), mapOptions);    
    
    
    var markerOptions = {
        map: map,
        position: sukrupaMarkerPosition
    };        
    var marker = new google.maps.Marker(markerOptions);    
    
    
    var infoOptions = {
        content: infoWindowContent,
        position: sukrupaMarkerPosition
    };    
    var infoWindow = new google.maps.InfoWindow(infoOptions);    
    infoWindow.open(map);
    
    
    var infoWindowOpened = true;
    function toggleInfoWindow() {
        if (infoWindowOpened)
            infoWindow.close();
        else {
            infoWindow.open(map);
            map.setCenter(mapCenter);
        }
        infoWindowOpened = !infoWindowOpened;
    };
        
    google.maps.event.addListener(marker, 'click', toggleInfoWindow);
    google.maps.event.addListener(infoWindow, 'closeclick', function() {
        infoWindowOpened = false;
    });
 }
