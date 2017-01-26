jQuery(function($) { 
	$('a[href^="#"]').live('click',function(event){
		event.preventDefault();
		var target_offset = $(this.hash).offset() ? $(this.hash).offset().top : 0;
		//change this number to create the additional off set        
		var customoffset = 70;
		$('html, body').animate({scrollTop:target_offset - customoffset}, 1000);
	});
});