<!-- Map script adapted from http://www.ramirezcobos.com/2010/01/22/get-latitude-and-longitude-with-google-maps-v3/ -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<style>
div#gmap {
width: 100%;
height: 300px;
}
</style>
<div id="mapHolder">
<!-- MAP HOLDER -->
<div id="gmap"></div>
<!-- REFERENCES -->
lat:<span id="lat2"></span> lon:<span id="lon2"></span><br/>
zoom level: <span id="zoom_level"></span>
</center>
</div>
<script>
document.getElementById("zoom_level").innerHTML = 16;
document.getElementById("lat2").innerHTML = 47.654;
document.getElementById("lon2").innerHTML = -122.31;

var myLatlng = new google.maps.LatLng(document.getElementById("lat2").innerHTML, document.getElementById("lon2").innerHTML);
var myOptions = {
zoom: 16,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById("gmap"), myOptions);
// marker refers to a global variable
marker = new google.maps.Marker({
position: myLatlng,
map: map
});
// if center changed then update lat and lon document objects
google.maps.event.addListener(map, 'center_changed', function() {
var location = map.getCenter();
document.getElementById("lat").value = Math.round(location.lat() * 1e6);
document.getElementById("lon").value = Math.round(location.lng() * 1e6);
document.getElementById("lat2").innerHTML = Math.round(location.lat() * 1e6) / 1e6;
document.getElementById("lon2").innerHTML = Math.round(location.lng() * 1e6) / 1e6;
// call function to reposition marker location
placeMarker(location);
});
// if zoom changed, then update document object with new info
google.maps.event.addListener(map, 'zoom_changed', function() {
zoomLevel = map.getZoom();
document.getElementById("zoom_level").innerHTML = zoomLevel;
});
// double click on the marker changes zoom level
google.maps.event.addListener(marker, 'dblclick', function() {
zoomLevel = map.getZoom()+1;
if (zoomLevel == 20) {
zoomLevel = 10;
}
document.getElementById("zoom_level").innerHTML = zoomLevel;
map.setZoom(zoomLevel);
});

function placeMarker(location) {
var clickedLocation = new google.maps.LatLng(location);
marker.setPosition(location);
}
</script>

