var $ = jQuery.noConflict();
   (function($){ 
   
  $( document ).ready(function() {
  
  $("a").each(function () {
      var href=$(this).prop('href');
      if (href.indexOf('penny') > -1) {
          $(this).hide();
      }
  });
  
  $("a").each(function () {
      var href=$(this).prop('href');
      if (href.indexOf('aldi') > -1) {
          $(this).hide();
      }
  });
  
  $("a").each(function () {
      var href=$(this).prop('href');
      if (href.indexOf('auchan') > -1) {
          $(this).hide();
      }
  });
  
  $("a").each(function () {
      var href=$(this).prop('href');
      if (href.indexOf('lidl') > -1) {
          $(this).hide();
      }
  });
  
  $("a").each(function () {
      var href=$(this).prop('href');
      if (href.indexOf('spar') > -1) {
          $(this).hide();
      }
  });
  
});
})(jQuery);
