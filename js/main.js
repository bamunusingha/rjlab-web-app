
/* 
 * fix the navigation
 */

$(document).ready(function (){

  var navpos = $('#mainNavigationBar').offset();
  console.log(navpos.top);

  $(window).bind('scroll', function() {
      if ($(window).scrollTop() > navpos.top) {
        $('#mainNavigationBar').addClass('affix');
       
       }
       else {
         $('#mainNavigationBar').removeClass('affix');
       
       }
    });

});

$(document).ready(function (){

  //Create button to scroll to top of page
$('.toTopNav').css('cursor', 'pointer');
//Scroll to the top of page
$('.toTopNav').click(function(){
    $('html, body').animate({scrollTop:0}, 'fast');
    return false;
});
//Make button appear only when scrolled below 100px
$(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
        $('.toTopNav').show();
    }
    if ($(this).scrollTop() < 100) {
        $('.toTopNav').hide();
    }
});

});



$(document).ready(function() {
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
          title : {
            type : 'inside'
          },
          buttons : {}
        }
  });
});



$(document).ready(function (){

  // create a LatLng object containing the coordinate for the center of the map
  var latlng = new google.maps.LatLng(6.862714, 79.883824);

  // prepare the map properties
  var options = {
    zoom: 16,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    navigationControl: true,
    mapTypeControl: false,
    scrollwheel: false,
    disableDoubleClickZoom: true
  };

  // initialize the map object
  var map = new google.maps.Map(document.getElementById('google_map'), options);

  // add Marker
  var marker1 = new google.maps.Marker({
    position: latlng, map: map
  });

  // add listener for a click on the pin
  google.maps.event.addListener(marker1, 'click', function() {
    infowindow.open(map, marker1);
  });

  // add information window
  var infowindow = new google.maps.InfoWindow({
    content:  '<div class="info"><strong>this is where i live!</strong><br><br>My address is here<br> 37/3A,Wijayamangalarama Road,Kohuwala </div>'
  });  
});