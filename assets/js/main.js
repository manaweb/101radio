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

	$('.nav-tabs > .fotos a, .nav-tabs > .videos a').click(function() {
		var id = $(this).parent().attr('class');

		if (id == 'fotos') {
			$('.retangulo-conteudo','.fotos-videos').css('background-color','#E8EDF1');
			$('.fotos li img').css('border-color','#B0C6DC');
		}else {
			$('.retangulo-conteudo','.fotos-videos').css('background-color','#E8F4E8');
			$('.videos li iframe').css('border-color','#CBDEB1');
		}
	});

});