  <!-- Content Wrapper. Contains page content -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrDrgQd9k7NvD8a5dqaWC89sUaodDIQTg"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgwp4D2laPvYntR9Sq1_swfGQObiGQaJw"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
  <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			    			<div class="col-md-12">
    			    				
<script>


</script>
<?php// print_r($result); ?>
<input type="hidden" id="route_id" value="<?=$_REQUEST['key']?>">

<div id="mapContainer">
    <div id="mapCanvas"></div>
</div>
<input type="button" class="btn btn-success" value="Set Route" id="reloadMarkers1" onclick="sendDataToServer()">
</div>
				            
    		</div>
    	</section>

  </div>
  <script type="text/javascript">
var geocoder;
var map;
var end_address=new Array();
var start_address=new Array();
var start_location=new Array();
var end_location=new Array();
var calculatedAddress=new Array();
var calculatedLatLng=new Array();
var lat=new Array();
var lng=new Array();
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var request = {
    travelMode: google.maps.TravelMode.DRIVING
  };

  var locations=new Array();
  var i=1;
  <?php
  $count=count($result);
  $c=$count-1; 

        if($count>=2)
        { ?>
          locations[0]=["","<?=$result[0]->lat?>","<?=$result[0]->lng?>"];
          var j="<?=$c?>";
          locations[j]=["","<?=$result[1]->lat?>","<?=$result[1]->lng?>"];
        <?php }
      for ($i=2;$i<$count;$i++) {  ?>
        
        locations[i]=["","<?=$result[$i]->lat?>","<?=$result[$i]->lng?>"];
        i++;
    <?php } ?>
  // console.log(locations);
// var locations = [
//   ['Manly Beach', 23.2332992,77.43359],
//   ['Bondi Beach', 23.2318921,77.4325188],
//   ['Coogee Beach', 23.21606,77.44087],
//   ['Maroubra Beach', 23.17754,77.43914]
  
// ];

function setMarkers(locations)
{
   var marker, i;
  
  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
     
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));

    if (i == 0) request.origin = marker.getPosition();
    else if (i == locations.length - 1) request.destination = marker.getPosition();
    else {
      if (!request.waypoints) request.waypoints = [];
      request.waypoints.push({
        location: marker.getPosition(),
        stopover: true
      });
    }
// var lat = marker.getPosition().lat();
// // var lng = marker.getPosition().lng();
// alert(lat);
  }
 


  //google.maps.event.trigger(marker, "click");  

}

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer({
     draggable: true,
     icon: {
      path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
      scale: 10,
      strokeColor: '#FF0000' 
    }

  });


  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 10,

    center: new google.maps.LatLng(23.2332992,77.4316238,19),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  directionsDisplay.setMap(map);
  var infowindow = new google.maps.InfoWindow();

setMarkers(locations);
 directionsDisplay.addListener('directions_changed', function() { computeTotalDistance(directionsDisplay.getDirections()); });
  directionsService.route(request, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
    }
  });
//document.getElementById('reloadMarkers').addEventListener('click', getLatLng);
}
initialize();

function getLatLng()
{
//   var lat = marker.getPosition().lat();
// var lng = marker.getPosition().lng();
// alert(lat);
google.maps.event.addListener(map, 'click', function(event) {

    marker = new google.maps.Marker({position: event.latLng, map: map});

});
//alert(marker);
}
 function computeTotalDistance(result) {

var end_address=new Array();
var start_address=new Array();
var start_location=new Array();
var end_location=new Array();
var calculatedAddress=new Array();
var calculatedLatLng=new Array();
var lat=new Array();
var lng=new Array();
        
        var myroute = result.routes[0];
    //console.log(JSON.stringify(myroute.legs));
        for (var i = 0; i < myroute.legs.length; i++) {
         // push.total=myroute.legs[i];
          end_address.push(myroute.legs[i].end_address);
          start_address.push(myroute.legs[i].start_address);
          start_location.push(myroute.legs[i].start_location);
          end_location.push(myroute.legs[i].end_location);

        }
     
       for(var j=0;j<=start_address.length;j++)
       {
        if(start_address[j]==end_address[j])
        {
          calculatedAddress[j]=start_address[j];
        }
        else
        {
         calculatedAddress[j]=start_address[j];
        }
        if(j==start_address.length)
        {
          calculatedAddress[j]=end_address[j-1];
        }
       }
        var obj1=JSON.stringify(start_location);
       var obj1=JSON.parse(obj1);

      var obj2=JSON.stringify(end_location);
      var obj2=JSON.parse(obj2);

       for(var k=0;k<obj1.length;k++)
       {
        //console.log(obj1[k].lat);
        if(obj1[k].lat==obj2[k].lat)
        {
          //alert(obj1[k].lat);
          lat[k]=obj1[k].lat;
          lng[k]=obj1[k].lng;
        }
        else
        {
         lat[k]=obj1[k].lat;
         lng[k]=obj1[k].lng;
        }
        if(k==obj1.length-1)
        {
          lat[k+1]=obj2[k].lat;
          lng[k+1]=obj2[k].lng;
        }
        //console.log(k);
       }
       //var obj=JSON.stringify(calculatedLatLng);
      // var obj2=JSON.parse(obj);
       // console.log(obj1[0].lat);
        //console.log(lat);
       localStorage.setItem("address",JSON.stringify(calculatedAddress));
       localStorage.setItem("lat",JSON.stringify(lat));
       localStorage.setItem("lng",JSON.stringify(lng));
       // console.log(calculatedAddress[0]);
        // total = total / 1000;
        // document.getElementById('total').innerHTML = total + ' km';
      }
//google.maps.event.addDomListener(window, "load", initialize);


//   	var map;
// var markers = []; // Create a marker array to hold your markers
// var beaches = [
//     ['Jyoti Cineplex', 23.2332992,77.43359, 17],
//     ['Milan Sweets', 23.21606,77.44087,17],
//     ['Zone I', 23.2318921,77.4325188,20],
//     ['ZONE I', 23.17754,77.43914,19]
    
// ];
// function setMarkers(locations) {
// var iconBase = "<?=base_url('resources/icons/')?>";

//     for (var i = 0; i < locations.length; i++) {
//         var beach = locations[i];
//         var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
//         var marker = new google.maps.Marker({
//             position: myLatLng,
//             map: map,
//             draggable:true,
//             icon: iconBase + '3dCar1.png',
//             animation: google.maps.Animation.DROP,
//             title: beach[0],
//             zIndex: beach[3]
//         });
       
//         // Push marker to markers array
//         markers.push(marker);
//     }
// }
// function reloadMarkers() {
 
//     // Loop through markers and set map to null for each
//     for (var i=0; i<markers.length; i++) {
     
//         markers[i].setMap(null);
//     }
    
//     // Reset the markers array
//     markers = [];
    
//     // Call set markers to re-add markers
//     setMarkers(beaches);
// }
// function initialize() {
    
//     var mapOptions = {
//         zoom: 17,
//         center: new google.maps.LatLng(23.2332992,77.4316238,19),
//        mapTypeId: google.maps.MapTypeId.ROADMAP
//       // mapTypeId: 'roadmap'
//     }
    
//     map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
//     setMarkers(beaches);
//     var path=[new google.maps.LatLng(23.2332992,77.43359),
//         new google.maps.LatLng(23.21606,77.44087),
//         new google.maps.LatLng(23.2318921,77.4325188),
//         new google.maps.LatLng(23.17754,77.43914,19)
//         ];
//      var redline = new google.maps.Polyline({
//       path: path,
//       map:map,
//       geodesic: true,
//       strokeColor: "#FF0000",
//       strokeOpacity: 1.0,
//       strokeWeight: 2
//     });
//      //redline.push(redline);
//    redline.setMap(map);
//     // Bind event listener on button to reload markers
//     document.getElementById('reloadMarkers').addEventListener('click', reloadMarkers);
// }

// initialize();

function sendDataToServer()
{
  // console.log(JSON.parse(localStorage.getItem("address")));
  // console.log(localStorage.getItem("lat"));
  // console.log(localStorage.getItem("lng"));
  var add1=JSON.parse(localStorage.getItem("address"));
  var lat1=JSON.parse(localStorage.getItem("lat"));
  var lng1=JSON.parse(localStorage.getItem("lng"));
  $.ajax({
type:'POST',
url:'<?php echo base_url('admin/setRouteByAdmin');?>',
data:{route_id:$('#route_id').val(),address:add1,lat:lat1,lng:lng1},
success:function(data)
{
  location.href="<?=base_url('admin/assignedDriverList')?>";
  //console.log(data);
//alert(data);
}
})
}
  </script>
  
  <!-- /.content-wrapper -->
  


