$(document).ready(function() {

	$('.carousel').carousel('pause');
 	
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

	$('.verfotos-btn.direita').click(function() {
		$('.carousel').carousel('next');
	});
	$('.verfotos-btn.esquerda').click(function() {
		$('.carousel').carousel('prev');
	});

	$('.btn-voltar').click(function() {
		window.history.back();
	});

	$('.versao-mobile > a').tooltip();
	// $('.equipe li a').each(function() {
	// 	var width = $('img',this).width();
	// 	$(this).width(width).css('margin','auto');
	// 	$('.tarja',this).width(width).css('margin-left',$('img',this).position().left+'px');
	// });

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

	$('.tamanho-texto a').click(function() {
		var id = $(this).attr('id');
		if (id == 'max')
			$('.contexto').css('font-size','+=1px');
		else
			$('.contexto').css('font-size','-=1px');
	});

	$('.modal').on('show.bs.modal',function() {
		$('html').width($('html').width()+15);
	});
	$('.modal').on('hidden.bs.modal',function() {
		$('html').width($('html').width()-15);
	});

});

$(window).load(function() {
	if ($('html').width() > 768) {
		$('.equipe li a').each(function() {
		 	var width = $('img',this).width();
			$('.tarja',this).width(width);
		});
	}
})
