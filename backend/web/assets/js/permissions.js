$(document).ready((function ($) {
   "use strict";
   function getFilters() {
      var role = (($('#role-filter').val() !== '') ? '.' + $('#role-filter').val() : '');
      var inter = (($('#interface-filter').val() !== '') ? '.' + $('#interface-filter').val() : '');
      $('.permission-item').hide();

         $('.permission-item' + role + inter).show();
   }

   $('#interface-filter, #role-filter').on('change', function () {
      getFilters();
   });


   /*
         $(function () {
   // init Isotope
            var $grid = $('.permissions').isotope({
               itemSelector: '.permission-item',
               layoutMode: 'fitRows'
            });
   // filter functions
            var filterFns = {
               // show if number is greater than 50
               numberGreaterThan50: function () {
                  var number = $(this).find('.number').text();
                  return parseInt(number, 10) > 50;
               },
               // show if name ends with -ium
               ium: function () {
                  var name = $(this).find('.name').text();
                  return name.match(/ium$/);
               }
            };
   // bind filter on select change
            $('#interface-filter').on('change', function () {
               // get filter value from option value
               var filterValue = this.value;
               // use filterFn if matches value
               filterValue = filterFns[filterValue] || filterValue;
               $grid.isotope({filter: filterValue});
            });
            $('#role-filter').on('change', function () {
               // get filter value from option value
               var filterValue = this.value;
               // use filterFn if matches value
               filterValue = filterFns[filterValue] || filterValue;
               $grid.isotope({filter: filterValue});
            });
         });*/
})(jQuery));