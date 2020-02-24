$(document).ready(function ($) {
   "use strict";
   /*==== search list ====*/
   $(function () {
      if ($('#search-page').length) {
         var opt = {
            valueNames: ['s-service-provider', 's-type', 's-departure', 's-duration', 's-arrival', 's-fare', 's-seats']
         };

         var searchList = new List('search-page', opt);
      }


   });
   /*==== Select Seats ====*/
   $('body').on('click', '.select-seat', function () {

      var button = $(this);

      var searchlist = $(this).parents('li');
      var listDetails = searchlist.find('.list-item');
      var listOptions = searchlist.find('.list-options');
      if (listOptions.hasClass('display-none')) {
         listOptions.removeClass('display-none');
         button.html('Hide Seats');
      } else {
         listOptions.addClass('display-none');
         button.html('Select Seats');
      }
   });

   $(function () {

      function bookingPanel(input) {
         var pane = input.parents('.tab-pane');
         var seats = input.parents('.seats');
         var panel = (pane.find('.booking-panel').length > 0) ? pane.find('.booking-panel') : $('<div class="booking-panel"></div>');
         if (seats.find('[type="checkbox"]:checked').length > 0) {
            if (pane.find('.booking-panel').length > 0) {
               panel = pane.find('.booking-panel');
               panel.show();
            } else {
               pane.append('<div class="booking-panel"></div>');
            }
         } else {
            if (pane.find('.booking-panel').length > 0) {
               pane.find('.booking-panel').hide();
            }
         }
      }

      function initSeats() {
         $('.seats').on('change', '[type="checkbox"]', function () {
            bookingPanel($(this));
         });
      }

      initSeats();
   });


   /* === Starr Plugin === */
   if ($('[data-plugin="star"]').length) {
      $('[data-plugin="star"]').starrr({
         change: function (e, value) {
            if (value) {
               /*      console.log(value);
                     console.log(e);*/
            }
         }
      });
   }

   // Select Seats
   $('.select-seats').on('click', function () {
      function fetchData($sid) {
      }

      function setSeatPlan() {
      }

      var listItem = $(this).parents('li');
      var schedule = listItem.data('id');
      var listOptions = listItem.find('list-options');
      var tabs = listOptions.find('.list-option-tabs');

      tabs.find('.nav-tabs a[href="#seats"]').trigger('click');
      listOptions.toggle();
   });

   $(function () {
      $('#toggle-filter').on('click', function () {
         $('#search-details-wrapper').toggleClass('with-filter');
      });
   });

   function submitBooking() {
   alert('ok');
      $.ajax({
         url: baseUrl + '/api/book/create-booking',
         type: 'post',
         data: {
            post: data
         },
         success: function (data) {
            if (data === 'true') {
               notify('Updated', 'success');
               return true;
            } else {
               notify('Sorry, Please try again.', 'danger');
               return false;
            }
         },
         error: function () {
            notify('Sorry, Server Error.', 'danger');
            return false;
         }
      });
   }

   $(function () {
      var form = $("#booking-form").show();
      form.steps({
         headerTag: "h3",
         bodyTag: "fieldset",
         transitionEffect: "slideLeft",
         onStepChanging: function (event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
               return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
               return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
               // To remove error styles
               form.find(".body:eq(" + newIndex + ") label.error").remove();
               form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
         },
         onStepChanged: function (event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
               form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
               form.steps("previous");
            }
         },
         onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
         },
         onFinished: function (event, currentIndex) {
            submitBooking();
         }
      }).validate({
         errorPlacement: function errorPlacement(error, element) {
            element.before(error);
         },
         rules: {
            confirm: {
               equalTo: "#password-2"
            }
         }
      });
   });

});