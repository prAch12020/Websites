function initMap(){
        var map;
        let map1 = document.getElementById("map");
        map1.style.height = '400px';
        map1.style.width = '100%';
        map1.style.position = 'static'; 
        map1.style.overflow = 'scroll';
        let markers = [];
        let infoWindowContent = [];
        for(let i = 0; i<lats.length; i++){
          markers.push([lats[i], longs[i], adds[i], names[i], phones[i], emails[i], ids[i]]);
        }

        for(let i =0;i<markers.length; i++){
          let coord = { lat: markers[i][0], lng: markers[i][1] };
          var mapOptions = {
            mapTypeId: 'roadmap',
            zoom: 13,
            center: coord
          };

          map = new google.maps.Map(map1, mapOptions);
          map.setTilt(45);
                                      
          var infoWindow = new google.maps.InfoWindow(), arr, j;
          
          for( j = 0; j < markers.length; j++ ) {
            var position = new google.maps.LatLng(markers[j][0], markers[j][1]);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[j][2]
            });
            
            google.maps.event.addListener(marker, 'click', (function(marker, j) {
              return function() {
                infoWindow.setContent('<div class="info_content">' +
              '<h6>Location: <b>'+markers[j][2]+'</b></h6><p>'+markers[j][3]+'<br><a class="sec-button"'+ 
              'href="tel:+254'+markers[j][4]+'">+254'+markers[j][4]+'</a><br>'+
              '<a class="sec-button"  href="mailto:'+markers[j][5]+'">'+markers[j][5]+'</a></p>' +
              '</div>');
                infoWindow.open(map, marker);
                document.getElementById('vet').value =  markers[j][6];
                document.getElementById('phone').value =  "0"+markers[j][4];
                document.getElementById('email').value =  markers[j][5];
                document.getElementById('name').value =  markers[j][3];
                document.getElementById('address').value =  markers[j][2];
              }
            })(marker, j));
          }
        }
}
    function sendAddress(lat, long, add, name, phone, email, id){
      lats.push(lat);
      longs.push(long);
      adds.push(add);
      names.push(name);
      phones.push(phone);
      emails.push(email);
      ids.push(id);
      window.initMap = initMap();
    }
