
<hr>

      <div id ="footer" class="cf">

        <div class="column three">
        <strong>Tel.nr.</strong>
        +37060000000<br><br>
        <a href="mailto:vygandas.lepsys@gmail.com">Susisiekite el. paštu!</a>
      </div>

      <div class="column three">
      <strong>Vieta</strong>
      54 Tuskulėnų g., Vilnius
      Lithuania
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(54.701461, 25.289908),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:230px;
      height:190px;"></div>

</body>
</html>

    </div>

    <div class="column three last">
    <strong>Valandos</strong>
    <em>Tuesday - Friday</em><br>
    9:00pm - 5:00am<br><br>



  </div>
  </div>
  <div class="copyright-info">
  <?php include('../../assets/includes/copyright.php'); ?>
  </div>

</body>
</html>
