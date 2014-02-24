$(document).ready(function() {
 	
	//Enable swiping...
	$(".carousel-inner").swipe( {

		//Generic swipe handler for all directions
		swipeLeft:function(event, direction, distance, duration, fingerCount) {
			$(this).parent().carousel('next'); 
		},
		swipeRight: function() {
			$(this).parent().carousel('prev'); 
		},
		//Default is 75px, set to 0 for demo so any distance triggers swipe
		threshold: 75
	});
	$('.carousel').carousel({wrap: false});

	var myLatlng = new google.maps.LatLng(-21.25886,-48.323714);

	var myOptions = {
	  zoom: 18,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.HYBRID
	};

	map = new google.maps.Map(document.getElementById('mapita'), myOptions);

	var marker = new google.maps.Marker({
	 position: new google.maps.LatLng(-21.26018,-48.321675),
	 map: map,
	 draggable: false,
	 raiseOnDrag: false,
	 labelContent: "A",
	 labelAnchor: new google.maps.Point(3, 30),
	 labelInBackground: false
	});

	$('.nav-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show');
	});

});