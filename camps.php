
<?php

include 'connect.php';

$loc = array();

$query1 = "SELECT campID, camp, city, date, price from camps";

$sql1 = $db->query($query1) or trigger_error($db->error."[$sql1]");


  // display each camp
while($rs1 = $sql1->fetch_array(MYSQLI_ASSOC)){ 
  echo    
     "<li class='camp-list campID' id='$rs1[camp]'>   
        <ul class='ul-info' >
          <li class='camp-name' >
            <h4 class='name'>$rs1[camp]</h4>
          </li>
          <ul class='activities' > activities  
            <li class='camp-info activity'> ";
        // display each activity for eaach camp
$query2 = "SELECT activity from activities WHERE campID = $rs1[campID]";
$sql2 = $db->query($query2) or trigger_error($db->error."[$sql2]");
while($rs2 = $sql2->fetch_array(MYSQLI_ASSOC)){ 
          echo      
            "$rs2[activity], ";
             
          }
    echo   "</li> 
          </ul> <h5>info</h5>
          <ul class='camp-ino '>  
            <li class='camp-info city' >$rs1[city]</li>   
            <li class='camp-info date' >$rs1[date]</li>   
            <li class='camp-info price' >$rs1[price]</li>
          </ul>";
  //used in mapping
      $loc[] = $rs1['city'];
      $camp[] = $rs1['camp'];

  echo "</ul> </li>";
}


$db = null;
?>


<!-- creating the map -->
<script type="text/javascript">
function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: 37.8833, lng: -97.0167}
        });

        var geocoder = new google.maps.Geocoder();
            //just to see if it would worked...
        var loc = new Array(<?php 
                  $i = count($loc);
                    foreach($loc as $value){
                      if($i-1){
                        echo '"' . $value . '"' .", ";
                        $i--;
                      }
                      else
                        echo '"' . $value . '"' . ")";
                    }
              ?>

        var camp = new Array(<?php 
                  $i = count($camp);
                    foreach($camp as $value){
                      if($i-1){
                        echo '"' . $value . '"' .", ";
                        $i--;
                      }
                      else
                        echo '"' . $value . '"' . ")";
                    }
              ?>

            var i;
          for (i = loc.length; i >= 0; i--){
              geocodeAddress(loc[i], camp[i], geocoder, map);
            }

      }
          //turn location from camps into long./lat.
      function geocodeAddress(address, name, geocoder, resultsMap) {
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
                //place a marker for each camp on the map
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              draggable: false,
              title: name
            });
          } 
        });

      }
      </script>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk_yqkKBBF8l1SmCartAgYJMP5n4sVfSY&callback=initMap">
        </script>
        


