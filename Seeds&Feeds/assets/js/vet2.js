


/*function initMap() {
    let map1 = document.getElementById("map");
    let kka = {lat: 0.416918, lng: 34.6635};
                map = new google.maps.Map((map1), {
                    center: {lat: 0.416918, lng: 34.6635},
                    zoom: 4,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.ZOOM_PAN
                    }
                });
                addMarker(0.416918, 34.6635, '<b>Location A</b>');
                //addMarker(C, D, '<b>Location B</b>');
                //addMarker(E, F, '<b>Location C</b>');
                
                //center = bounds.getCenter();
                //map.fitBounds(bounds);
                map1.style.height = '400px';
  map1.style.width = '100%';
  map1.style.position = 'static'; 
    map1.style.overflow = 'scroll'
        }*/
/*function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.031 };
  // The map, centered at Uluru
  let map1 = document.getElementById("map");
  const map = new google.maps.Map((map1), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru


function addMarker(lat, long, loc){
  const marker = new google.maps.Marker({
    position: {lat: lat, lng: long},
    map: map,
  });
}*/

$(document).on('submit', '#vet-form', (e) => {
    e.preventDefault();
    let vet = $('#vet').val();
    let msg = $('#msg').val();
    let date = $('#date').val();
    $.ajax({
        type: "POST",
        url: "data/contact.php",
        data: {
        	vet: vet,
            msg: msg,
            date: date
        },
        dataType: 'text',
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    $('#vet-form')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});
