var $ = jQuery.noConflict();
(function($){

Drupal.behaviors.selectToUISlider = {
			  attach: function (context, settings) {
				$(function(){       
		$("select#edit-field-szazalek-value-selective").selectToUISlider({
  labels:2, tooltip:true, sliderOptions: {
  stop: function(event,ui) {
	 $( "#slider-range" ).slider("destroy");
	 $('select#edit-field-szazalek-value-selective option').trigger('change');
	 $('select#edit-field-szazalek-value-selective option:selected').trigger('click');
	}
	}}).hide();
		});
		 $( "#edit-sort-bef-combine-wrapper" ).hide( );
		  }
		  };
})(jQuery);