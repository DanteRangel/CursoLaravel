		var map;
		var markers = [];
		var address;
		var infowindow;
		var geocoder;

		function initMap() {
		  var haightAshbury = latLng;
		  geocoder = new google.maps.Geocoder;
		  infowindow = new google.maps.InfoWindow;
		    map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 12,
		    center: latLng,
		    mapTypeId: google.maps.MapTypeId.TERRAIN
		  });
		  marker=addMarker(haightAshbury);
		  geocodeLatLng(geocoder, map, infowindow);
		  // Event listener para obtener la ubicacion del click en el mapa y agregar el marker con esa posición
		  map.addListener('click', function(event) {
		    marker= addMarker(event.latLng);
		    geocodeLatLng(geocoder, map, infowindow);
		  });


		}
		function geocode() {
		  var address = document.getElementById("direccion_postal").value;
		    geocoder.geocode({
		      'address': address,
		      'partialmatch': true
		    }, geocodeResult);
		  }
		  function geocodeResult(results, status) {
		    if (status == 'OK' && results.length > 0) {
		      map.fitBounds(results[0].geometry.viewport);
		      addMarker(results[0].geometry.location);
		    } else {
		     // alert("Geocode was not successful for the following reason: " + status);
		    }

		  }
		function geocodeLatLng(geocoder, map, infowindow) { 
		  geocoder.geocode({'location': latLng}, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		      if (results[0]) { 
		        infowindow.setContent(results[0].formatted_address);
		        infowindow.open(map, marker);
		        $('#direccion_postal').val(results[0].formatted_address);
		      } else {
		        window.alert('No results found');
		        $('#direccion_postal').val('Dirección no encontrada');
		      }
		    } else {
		      window.alert('Geocoder failed due to: ' + status);
		    }
		  });
		}

		// Agregando marcador al mapa
		function addMarker(location) {
		  clearMarkers();
		  var marker = new google.maps.Marker({
		    position: location,
		    map: map
		  });
		  latLng=location;
		  markers.push(marker);  
		  console.log(marker);
		  document.getElementById("latitud").value=marker.getPosition().lat();
		  document.getElementById("longitud").value=marker.getPosition().lng();
		  return marker;        
		}

		// Sets the map on all markers in the array.
		function setMapOnAll(map) {
		  for (var i = 0; i < markers.length; i++) {
		    markers[i].setMap(map);
		  }
		}

		// Removes the markers from the map, but keeps them in the array.
		function clearMarkers() {
		  setMapOnAll(null);
		}

		// Shows any markers currently in the array.
		function showMarkers() {
		  setMapOnAll(map);
		}

		// Deletes all markers in the array by removing references to them.
		function deleteMarkers() {
		  clearMarkers();
		  markers = [];
		}
		function getPositionDir(marker){
		}