function truncateDate(date) {
   "use strict";
   return new Date(date.getFullYear(), date.getMonth(), date.getDate());
}

$(document).ready(function ($) {
   "use strict";


   $(function () {
      if ($('.home-banner').length > 0) {
         $('.home-banner').carousel();
      }
   });

   /* ==== Show Hide Departure Date ====*/
   $(function () {
      var oneWay = $("#one-way");
      var twoWay = $("#two-way");
      var arrivalPicker = $('.arrival-date');
      oneWay.on("click", function () {
         $(this).addClass('btn-active');
         twoWay.removeClass('btn-active');
         arrivalPicker.hide();

      });
      twoWay.on("click", function () {
         $(this).addClass('btn-active');
         oneWay.removeClass('btn-active');
         arrivalPicker.show();
      });


   });


   $(function(){

   });
   // Select 2

   $(function () {
      if ($('[data-plugin="select2"]').length) {
         $('[data-plugin="select2"]').select2({
            'width': '100%',
         });
      }
   });






});