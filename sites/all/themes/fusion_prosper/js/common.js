var $ = jQuery.noConflict();
   (function($){
	
	if ($(window).width() > 800) {
		   $("fieldset").removeClass('collapsed');
		   $("fieldset").trigger({ type: 'collapsed', value: false }
	);}

})(jQuery);