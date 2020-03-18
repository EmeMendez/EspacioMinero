function iniciarMap(){
    var coord = {lat:-29.9024534 ,lng: 71.2527487}; 
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}