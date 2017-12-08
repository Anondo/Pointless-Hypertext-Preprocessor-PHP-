var map;
var total_marker_count = getMarkerCount();
var crimeZones = getCrimeZones();
var marker_icon = {
     url: "http://localhost:"+location.port+"/Projects/aiub project/img/marker.png", // url
     scaledSize: new google.maps.Size(40, 40), // size
     origin: new google.maps.Point(0,0), // origin
     anchor: new google.maps.Point(0, 0) // anchor
 };
function initialize() {
  var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(23.777176, 90.399452)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var marker;
  for(var i = 0; i < total_marker_count; i++)
  {
      marker = new google.maps.Marker
      (
          {
              position: new google.maps.LatLng(crimeZones[i].latitude, crimeZones[i].longitude),
              map: map,
              title: '',
              icon: marker_icon,
              scaledSize: new google.maps.Size(100, 100) // scaled size
              //origin: new google.maps.Point(0,0), // origin
             // anchor: new google.maps.Point(0, 0)
          }
      );
  }
}
function getMarkerCount()
{
    var markerNo = 0;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            markerNo = this.responseText;
        }
    }
    ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub project/Views/action/locations_for_marker.php" , false);
    ajax.send();
    return markerNo;
}
function getCrimeZones()
{
    var cz;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            cz = JSON.parse(this.responseText);
        }
    }
    ajax.open("GET" , "http://localhost:"+location.port+"/Projects/aiub project/Views/action/json_locations.php" , false);
    ajax.send();
    return cz;
}

google.maps.event.addDomListener(window, 'load', initialize);
