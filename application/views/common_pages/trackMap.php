  <!-- Content Wrapper. Contains page content -->
 <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrDrgQd9k7NvD8a5dqaWC89sUaodDIQTg"></script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgwp4D2laPvYntR9Sq1_swfGQObiGQaJw"></script>
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			    			<div class="col-md-12">
    			    				
<script>

// function initMap() {
//     var map;
//     var bounds = new google.maps.LatLngBounds();
//     var mapOptions = {
//         mapTypeId: 'roadmap'
//     };
                    
//     // Display a map on the web page
//     map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
//     map.setTilt(50);
        
//     // Multiple markers location, latitude, and longitude
//     var markers = [['Brooklyn Museum, NY', 40.671531, -73.963588],
//         ['Brooklyn Public Library, NY', 40.672587, -73.968146],
//         ['Prospect Park Zoo, NY', 40.665588, -73.965336],
// 		['Barclays Center, Brooklyn, NY', 40.682906, -73.975362]
//     ];
//          console.log(markers);               
//     // Info window content
//     var infoWindowContent = [
//         ['<div class="info_content">' +
//         '<h3>Brooklyn Museum</h3>' +
//         '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
//         ['<div class="info_content">' +
//         '<h3>Brooklyn Public Library</h3>' +
//         '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
//         '</div>'],
//         ['<div class="info_content">' +
//         '<h3>Prospect Park Zoo</h3>' +
//         '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
//         '</div>']
//     ];
        
//     // Add multiple markers to map
//     var infoWindow = new google.maps.InfoWindow(), marker, i;
    
//     // Place each marker on the map  
//     for( i = 0; i < markers.length; i++ ) {
//         var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
//         bounds.extend(position);
//         marker = new google.maps.Marker({
//             position: position,
//             map: map,
//             title: markers[i][0]
//         });
        
//         // Add info window to marker    
//         google.maps.event.addListener(marker, 'click', (function(marker, i) {
//             return function() {
//                 infoWindow.setContent(infoWindowContent[i][0]);
//                 infoWindow.open(map, marker);
//             }
//         })(marker, i));

//         // Center the map to fit all markers on the screen
//         map.fitBounds(bounds);
//     }

//     // Set zoom level
//     var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
//         this.setZoom(14);
//         google.maps.event.removeListener(boundsListener);
//     });
    
// }
// // Load initialize function
// google.maps.event.addDomListener(window, 'load', initMap);
</script>
<div id="mapContainer">
    <div id="mapCanvas"></div>
</div>
<input type="button" value="Reload markers" id="reloadMarkers">
</div>
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">

// function initMap() {
//     var map;
//     var bounds = new google.maps.LatLngBounds();
//     var mapOptions = {
//         mapTypeId: 'roadmap'
//     };
                    
//     // Display a map on the web page
//     map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
//     map.setTilt(50);
        
//     // Multiple markers location, latitude, and longitude
//     var markers = [
//         ['Brooklyn Museum, NY', 40.671531, -73.963588],
//         ['Brooklyn Public Library, NY', 40.672587, -73.968146],
//         ['Prospect Park Zoo, NY', 40.665588, -73.965336]
//     ];
                        
//     // Info window content
//     var infoWindowContent = [
//         ['<div class="info_content">' +
//         '<h3>Brooklyn Museum</h3>' +
//         '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
//         ['<div class="info_content">' +
//         '<h3>Brooklyn Public Library</h3>' +
//         '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
//         '</div>'],
//         ['<div class="info_content">' +
//         '<h3>Prospect Park Zoo</h3>' +
//         '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
//         '</div>']
//     ];
        
//     // Add multiple markers to map
//     var infoWindow = new google.maps.InfoWindow(), marker, i;
    
//     // Place each marker on the map  
//     for( i = 0; i < markers.length; i++ ) {
//         var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
//         bounds.extend(position);
//         marker = new google.maps.Marker({
//             position: position,
//             map: map,
//             title: markers[i][0]
//         });
        
//         // Add info window to marker    
//         google.maps.event.addListener(marker, 'click', (function(marker, i) {
//             return function() {
//                 infoWindow.setContent(infoWindowContent[i][0]);
//                 infoWindow.open(map, marker);
//             }
//         })(marker, i));

//         // Center the map to fit all markers on the screen
//         map.fitBounds(bounds);
//     }

//     // Set zoom level
//     var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
//         this.setZoom(14);
//         google.maps.event.removeListener(boundsListener);
//     });
    
// }
// // Load initialize function
// google.maps.event.addDomListener(window, 'load', initMap);

  	var map;
var markers = []; // Create a marker array to hold your markers
var beaches = [
    ['Jyoti Cineplex', 23.2332992,77.43359, 17],
    ['Milan Sweets', 23.21606,77.44087,17],
    ['Zone I', 23.2318921,77.4325188,20],
    ['ZONE I', 23.17754,77.43914,19]
    
];
function setMarkers(locations) {
var iconBase = "<?=base_url('resources/icons/')?>";

    for (var i = 0; i < locations.length; i++) {
        var beach = locations[i];
        var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable:true,
            icon: iconBase + '3dCar1.png',
            animation: google.maps.Animation.DROP,
            title: beach[0],
            zIndex: beach[3]
        });
       
        // Push marker to markers array
        markers.push(marker);
    }
}
function reloadMarkers() {
 
    // Loop through markers and set map to null for each
    for (var i=0; i<markers.length; i++) {
     
        markers[i].setMap(null);
    }
    
    // Reset the markers array
    markers = [];
    
    // Call set markers to re-add markers
    setMarkers(beaches);
}
function initialize() {
    
    var mapOptions = {
        zoom: 17,
        center: new google.maps.LatLng(23.2332992,77.4316238,19),
       mapTypeId: google.maps.MapTypeId.ROADMAP
      // mapTypeId: 'roadmap'
    }
    
    map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
    setMarkers(beaches);
   //  var path=[new google.maps.LatLng(23.2332992,77.43359),
   //      new google.maps.LatLng(23.21606,77.44087),
   //      new google.maps.LatLng(23.2318921,77.4325188),
   //      new google.maps.LatLng(23.17754,77.43914,19)
   //      ];
   //   var redline = new google.maps.Polyline({
   //    path: path,
   //    map:map,
   //    geodesic: true,
   //    strokeColor: "#FF0000",
   //    strokeOpacity: 1.0,
   //    strokeWeight: 2
   //  });
   //   //redline.push(redline);
   // redline.setMap(map);
    // Bind event listener on button to reload markers
    document.getElementById('reloadMarkers').addEventListener('click', reloadMarkers);
}

initialize();
  </script>
  
  <!-- /.content-wrapper -->
  


