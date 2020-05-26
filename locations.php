<?php
include 'includes/header.inc.php';

 ?>
<link rel="stylesheet" href="css/locations.css">
<div class="map">
  <img src="images/menu/londonR.png" alt="map">
</div>
<div class="rest-info">
  <h1>Open Times</h1>
  <ul>
    <li><p><b>Monday :</b> 9:00 - 21:00</p></li>
    <li><p><b>Tuesday: </b> 9:00 - 21:00</p></li>
    <li><p><b>Wednesday: </b> 9:00 - 21:00</p></li>
    <li><p><b>Thursday: </b> 9:00 - 21:00</p></li>
    <li><p><b>Frieday: </b> 9:00 - 21:00</p></li>
    <li><p><b>Saturday: </b> 12:00 - 21:00</p></li>
    <li><p><b>Sunday: </b>closed</p> </li>

  </ul>

</div>
<div class="locs">
  <h1>Our Locations</h1>
  <h4>Visit us in person. We have many locations which are ready to sevre you</h4>
  <p>(mock locations)</p>
  <div id="myMap" style="position:relative;width:600px;height:400px;"></div>

</div>



<script type='text/javascript'>
  function GetMap() {
      var map = new Microsoft.Maps.Map('#myMap', {
          credentials: 'ArpkI4M5Cz7Ef7LESpyYdIhIkjicj9c00a6E0IfbHznX8cow05hDUW4V9xnzV_rB',
          center: new Microsoft.Maps.Location(51.512892, -0.127835),
          zoom:13
      });
      var center = map.getCenter();
      //Create custom Pushpin
      var pin = new Microsoft.Maps.Pushpin(center, {
          title: 'Location 1',
          subTitle: 'London',
          text: '1'
      });

      loc = new Microsoft.Maps.Location(51.509318, -0.136634)
      var pin2 = new Microsoft.Maps.Pushpin(loc, {
          title: 'Location 2',
          subTitle: 'London',
          text: '2'
      });

      loc2 = new Microsoft.Maps.Location(51.518202,-0.127286)
      var pin3 = new Microsoft.Maps.Pushpin(loc2, {
          title: 'Location 3',
          subTitle: 'London',
          text: '3'
      });



      //Add the pushpin to the map
      map.entities.push(pin);
      map.entities.push(pin2);
      map.entities.push(pin3);
  }
  </script>
  <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>


  <?php
  include 'includes/footer.inc.html';
  ?>
