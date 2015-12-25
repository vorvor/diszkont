var $ = jQuery.noConflict();
   (function($){

   $("a#opener").click(function(event){
	   event.preventDefault();
	   $(".views-exposed-form").toggle(1000);
   });

   if ($(window).width() > 800) {
	   $("fieldset").removeClass('collapsed');
	   $("fieldset").trigger({ type: 'collapsed', value: false })

	} 


	 $('.views-exposed-form a').click(function() {
		 $('.nodesinblock').hide();
		 $('.panel-col h2').hide();
		 $('#szuresek').hide();		 // or .remove() if you want to completely remove it;
	});	

		 $('select#edit-field-szazalek-value-selective').click(function() {
		 $('.nodesinblock').hide();
		 $('.panel-col h2').hide();
		 $('#szuresek').hide(); // or .remove() if you want to completely remove it;
	});	

	$('.panel-col-last img').click(function() {
		window.location.href = "http://diszkontkereso.hu/cart";
	});

	$.colorbox({width:"1000px", inline:true, href:"a.ui-corner-all"});

  })(jQuery);