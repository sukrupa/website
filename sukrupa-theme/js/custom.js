$(document).ready(function(){
  $('#masonry').masonry({ singleMode: true });
	
	//var theLoc = $('#slider').position().top;
	// now 105
	$(window).scroll(function() {
		if(105 >= $(window).scrollTop()) {
			if($('#slider').hasClass('fixed')) {
				$('#slider').removeClass('fixed');
			}
		} else { 
			if(!$('#slider').hasClass('fixed')) {
				$('#slider').addClass('fixed');
			}
		}
	});
});