(function ($, baseUrl, constants) {
   "use strict";
   var schedule = [];
   var bookingParams = {};

   function getSeatsInfo(seats) {
      var m = [];
      $.each(seats, function () {
         m.push({
            "id": $(this).data('seat'),
            "name": $(this).data('name')
         });

      });
      return m;
   }

   function afterSuccess(modal, schedule) {

      /* if (schedule.vehicle.map !== '') {
          modal.find('#seat-map').html('<img class="" src="' + schedule.vehicle.map + '" alt="Seat Map">');
       }*/

      modal.find('#seats').attr('data-id', schedule.id);
      if (schedule.vehicle.image !== '') {
         modal.find('#vehicle-image').attr('src', schedule.vehicle.image);
      }
      modal.find('#vehicle-type').html(schedule.vehicle.type.name);
      modal.find('#number-plate').html(schedule.vehicle.number_plate);
      modal.find('#vehicle-description').html(schedule.vehicle.description);
      modal.find('#cancellation-rates').html(schedule.cancellation.rates);
      modal.find('#cancellation-notes').html(schedule.cancellation.notes);

      if (typeof schedule.seats.layout !== "undefined" && !($.isEmptyObject(schedule.seats.layout))) {
         var t = "";
         // console.log(constants);
         //seat map replacement
         modal.find('#seats-layout-container').css("height", schedule.seats.size.dimensions.height + "px")
               .css("width", schedule.seats.size.dimensions.width + "px");
         $.each(schedule.seats.layout, function (index, value) {

            // console.log(value);
            var classes = (value.booking !== "undefined" && !($.isEmptyObject(value.booking))) ? ' booked ' : '';
            classes += ((value.status !== "undefined" && value.status === 0) || (value.booking !== "undefined" && !($.isEmptyObject(value.booking)))) ? ' disabled ' : '';
            // console.log(constants);
            var r = (value.reservation !== "undefined" && value.reservation !== "0") ? (constants['seat-reservations'][value.reservation]).charAt(0) : '';
            //   var classes = (typeof value.booking.status !== 'undefined' && value.booking.status > 0) ? constants.booking[value.booking.status] + ' ' : '';
            // var n = ((r !== '') ? ' - ' : '') + value.name;
            var n = value.name;
            //(value.booking !== "undefined" && !($.isEmptyObject(value.booking))) ||
            var d = ((value.booking !== "undefined" && !($.isEmptyObject(value.booking))) || (value.status !== "undefined" && value.status === 0)) ? ' disabled="disabled" ' : '';
            t += '<div class="seat ' + classes + '" style="top:' + value.position.top + ';left:' + value.position.left + '; width:' + value.size.width + '; height:' + value.size.height + ';  "  data-seat="' + value.id + '" data-name="' + value.name + '" data-status="' + value.status + '" data-reservation="' + value.reservation + '">' +
                  '<input type="checkbox" id="seat-' + index + '" class= "' + classes + '" ' + d + '/>' +
                  // '<input type="checkbox" id="seat-' + index + '" class= "' + constants.status[value.status] + ' ' + constants.reservations[value.reservation] + '  "/>' +
                  '<label for="seat-' + index + '"><span class="seat-reservation" style="">' + r + '</span><span class="seat-name" style="display: none"> ' + n + '</span></label>' +
                  '</div>';
         });
         if (t !== '') {
            modal.find('#seats-container').html(t);
         }
      }
      // console.log(schedule.routes.path);
      if (typeof schedule.route === 'object' && (!($.isEmptyObject(schedule.route)))) {
         var dr = '';
         $.each(schedule.route, function (index, value) {
            dr += '<li class="">' +
                  '<div class="timeline-badge success-outline">' + value.location.name.substr(1, 1) + '</div>' +
                  '<div class="timeline-panel">' +
                  '<div class="timeline-name">' + value.location.name + '<br/>' + value.location.city + ', State - ' + value.location.state + '</div>' +
                  '<div class="text-muted"><i class="mdi mdi-clock-outline"></i>' + value.time + '</div>' +
                  '</div>' +
                  '</li>';
         });
         if (dr !== '') {
            modal.find('#timeline').html(dr);
         }
      }
      if (typeof schedule.vehicle.ratings === 'object' && (!($.isEmptyObject(schedule.vehicle.ratings)))) {
         var vr = '';

         $.each(schedule.vehicle.ratings, function (index, value) {
            vr += '<li>' +
                  '<div class="rating-title">' + value.type + ' : <span class="rating-progress-score">' + value.rating + '</span></div>' +
                  '<div class="progress m-t-5 m-b-10">' +
                  '<div class="progress-bar bg-success" style="width:' + ((value.rating / 5) * 100) + '%;height:4px;" role="progressbar"></div>' +
                  '</div>' +
                  '</li>';
         });
         if (vr !== '') {
            modal.find('#ratings-details').html(vr);
         }
      }
      if (typeof schedule.vehicle.comments === 'object' && (!($.isEmptyObject(schedule.vehicle.comments)))) {
         var vc = '';
         $.each(schedule.vehicle.comments, function (index, value) {
            vc += '<li>' +
                  '<div class="comment">' + value.comment + '</div>' +
                  '<div class="author">' +
                  '<div class="pull-left">' + value.name + '</div>' +
                  '<div class="pull-right">' + value.date + '</div>' +
                  '<div class="clearfix"></div>' +
                  '</div>' +
                  '</li>';
         });
         if (vc !== '') {
            modal.find('#vehicle-reviews').html(vc);
         }


      }
   }

   function initModal(btn, modal, schedule, content) {

      /*modal.find('#seats-cover').on("click", function () {
         notify('Select Boarding and Dropping points first.', 'danger');
      });*/
      modal.on("show.bs.modal", function () {
         setBoarding(modal, schedule.prices);
         // step3(modal);

      });
      modal.on("hide.bs.modal", function () {
         destroy(btn, content);
      });
      modal.find('#seats-container .seat [type="checkbox"]').on("change", function () {
         if (modal.find('#seats-container .seat [type="checkbox"]:checked').length < constants['max-seats']) {
            modal.find('#seats-container .seat [type="checkbox"]:not(.booked)').removeAttr('disabled');
            //      toggleSeat($(this).parent('.seat'));

            var seat = $(this).parent('.seat');
            // toggleSeat(seat);
            if ($(this).prop('checked') === true) {
               seat.find('.seat-name').show();
               seat.find('.seat-reservation').hide();
            } else {
               seat.find('.seat-name').hide();
               seat.find('.seat-reservation').show();
            }

            calculateInvoice(modal);
            //    toggleSeat(seat);
         } else {
            modal.find('#seats-container .seat [type="checkbox"]:not(:checked)').attr('disabled', 'disabled');
         }

      });
      modal.find('#book').on('click', function () {
         step2(modal, schedule);
      });
      modal.find('#make-payment').on('click', function () {
         step3(schedule, modal);
      });
      modal.find('#select-seats-again').on('click', function () {
         goBack(modal);
      });
      /*
      modal.find('#print-ticket').on('click', function () {
         $('#printable').printThis({
            importCSS: true,
            debug: false,
            loadCSS: baseUrl + "/../common/assets/css/printable.css",
            // printDelay: 333,

         });
      });
      */
      modal.modal('show');
   }

   function bookTicket(schedule, modal, data) {

      $.ajax({
         url: baseUrl + '/bookings/book-ticket',
         async: true,
         type: 'post',
         data: {
            "data": data,
         },
         success: function (response) {
            if (response === 'booked') {
         //      notify("Your ticket  has been booked", 'success');
                bookingDone(schedule, modal, data);
            } else {
          //     notify("Could'nt book you ticket.", 'danger');
            }
            console.log(response);
         },
         error: function (response) {
       //     notify(response.responseText, 'danger');
            console.log(response);
         }
      });


   }


   function generateQR() {

      var qrHolder = $('#ticket-qr');
      qrHolder.qrcode({width: 72, height: 72, text: "size doesn't matter"});
      var canvas = $('#ticket-qr canvas');
      var img = canvas.get(0).toDataURL("image/png");
      var i = '<img src="' + img + '" alt="QR Code"/>';
      qrHolder.html(i);
   }

   function bookingDone(schedule, modal, data) {
      console.log(schedule);
      console.log(data);
      modal.find('#company').html(schedule.company);
      // modal.find('#code').html(schedule.);
      modal.find('#location_from').html(schedule.location_from);
      modal.find('#departure').html(schedule.departure);
      modal.find('#location_to').html(schedule.location_to);
      modal.find('#arrival').html(schedule.arrival);
      modal.find('#vehicle').html(schedule.vehicle.number_plate);
      modal.find('#contact').html(schedule.vehicle.contact_info);

      function getseatNames(seats) {
         var kk = '';
         $.each(seats, function (seat) {
            kk += ' ' + seat.name + ', ';
         });
         return kk;
      }

      modal.find('#ticket-seats').html(getseatNames(data.seats));
      modal.find('#price').html(data.price);
      $('#booking-panel').remove();
      generateQR();


      $('#booked-panel').show();
   }

   function setBoarding(modal, prices) {

      var boarding = modal.find('#boarding-points');
      var dropping = modal.find('#dropping-points');

      if (typeof prices === 'object' && $.isEmptyObject(prices) === false) {
         var b = '';
         $.each(prices, function (index, from) {
            b += ' <div class="radio-button">' +
                  '<input type="radio" id="b-' + index + '" class="" name = "boarding" value="' + index + '" data-location="' + from.data.location + '" data-id="' + from.data.location_id + '" data-address="' + from.data.address + '">' +
                  '<label for="b-' + index + '">' +
                  '<span class="location capitalize">' + from.data.location + '<span>' +
                  '</label>' +
                  '</div>';
         });
         boarding.html(b);
         boarding.find('[type="radio"]').on('change', function () {
            modal.find("#seats-cover").show();
            modal.find(".seat").find('[type="checkbox"]').prop('checked', false);
            $('#invoice-total').html("0");
            var to = (typeof prices[$(this).val()].to === 'object' && $.isEmptyObject(prices[$(this).val()].to) === false) ? prices[$(this).val()].to : '';
            if (typeof to === 'object' && $.isEmptyObject(to) === false) {
               var d = '';
               $.each(to, function (index, value) {
                  // console.log(value);
                  d += ' <div class="radio-button">' +
                        '<input type="radio" id="d-' + index + '"  name = "dropping" value="' + value.price + '" data-location="' + value.location + '" data-id="' + value.location_id + '" data-address="' + value.address + '">' +
                        '<label for="d-' + index + '">' +
                        '<span class="location capitalize">' + value.location + '<span>' +
                        '</label>' +
                        '</div>';

               });
               // console.log(to);
               dropping.html(d);
               dropping.find('[type="radio"]').on('change', function () {
                  modal.find('#seats-cover').hide();
                  calculateInvoice(modal);
               });


            }
         });
      }


   }

   function toggleBook(modal, price) {

      if (price > 0) {
         modal.find('#book').removeAttr('disabled');
      } else {
         modal.find('#book').attr('disabled', 'disabled');
      }
   }

   function calculateInvoice(modal) {
      var selected = '';
      var length = modal.find('[type="checkbox"]:checked').length;
      var dropping = $('#dropping-points');
      var price = length * ((dropping.find('[type="radio"]').val() > 0) ? dropping.find('[type="radio"]').val() : 0);

      var checked = modal.find('#seats-container [type="checkbox"]:checked');
      toggleBook(modal, price);

      $.each(checked, function (index) {
         var seat = $(this).parents('.seat');
         var data = {
            id: seat.data('seat'),
            name: seat.data('name'),
            status: seat.data('status'),
            reservation: seat.data('reservation')
         };

         selected += (data.name + ((index < length - 1) ? ', ' : ''));
      });
      modal.find('#selected-seat-count').html(length);
      modal.find('#selected-seats').html(selected);
      modal.find('#invoice-total').html(price);
      toggleBook(modal, price);
   }

   $.fn.serializeObject = function () {
      var o = {};
      var a = this.serializeArray();
      $.each(a, function () {
         if (o[this.name]) {
            if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
         } else {
            o[this.name] = this.value || '';
         }
      });
      return o;
   };


   function goBack(modal) {
      modal.find('#boarding-dropping-selected, #select-boarding-dropping, #seats-wrapper, #book-btn-wrapper').show();

      modal.find('#boarding-dropping-selected, #booking-steps,#payment-wrapper, #enter-detail-buttons').hide();

   }

   function toggleSeat(seat) {
      var data = {
         id: seat.data('seat'),
         sid: seat.parents('#seats').data('id'),
         name: seat.data('name'),
         selected: (seat.find('[type="checkbox"]').prop("checked") === true) ? 1 : 0
      };

      $.ajax({
         url: baseUrl + '/api/book/toggle-seat',
         async: true,
         type: 'post',
         data: {
            seat: data
         },
         success: function (response) {
            //  console.log(response);

         },
         error: function (responseJSON) {
            notify('Error', 'danger');
            console.log(responseJSON);
         }
      });
      return false;
   }

   function destroy(btn, content) {
      $('#booking-content').remove();
      $('#booking-panel').html(content);
      btn.find('.loader').hide();
      btn.find('.txt').show();
      btn.removeClass('bg-danger');
   }


   function step2(modal, schedule) {
      function generatePassengerForm() {
         // console.log(bookingParams.seats);

         var h = '';
         // console.log(bookingParams);
         $.each(bookingParams.seats, function (index, seat) {
            // console.log(seat);
            h += '<div class="passenger-' + seat.id + '">' +
                  '<label for="passenger-' + seat.id + '-name" class="m-b-5 text-muted text-sm required">Seat ' + seat.name + ' : Passenger ' + (index + 1) + '</label>' +
                  '<div class="row">' +
                  '<div class="col-sm-7">' +
                  '<div class="form-group">' +
                  '<input id="passenger-' + seat.id + '-name" type="text" name="passenger-' + seat.id + '-name" class="form-control required" placeholder="Enter name">' +
                  '</div>' +
                  '</div>' +
                  '<div class="col-sm-3">' +
                  '<div class="form-group">' +
                  '<select id="passenger-' + seat.id + '-gender" type="text" name="passenger-' + seat.id + '-gender"  class="form-control required">' +
                  '<option disabled selected>Gender</option>' +
                  '<option value="m">Male</option>' +
                  '<option value="f">Female</option>' +
                  '<option value="o">Other</option>' +
                  '</select>' +
                  '</div>' +
                  '</div>' +
                  '<div class="col-sm-2">' +
                  '<div class="form-group">' +
                  '<input id="passenger-' + seat.id + '-age" type="number"   name="passenger-' + seat.id + '-age"  class="form-control required" placeholder="Age">' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>';
         });
         return h;
         //  passengers.html(h);
         // console.log(seats);

      }

      bookingParams = {
         "scheduleId": schedule.id,
         "seats": getSeatsInfo(modal.find('#seats-container [type="checkbox"]:checked').parents('.seat')),
      };
      $(function () {
         var boarding = modal.find('[type="radio"]:checked');
         var dropping = modal.find('[type="radio"]:checked');
         bookingParams.locations = {
            "boarding": boarding.data('id'),
            "dropping": dropping.data('id'),
         };
         bookingParams.price = modal.find('#invoice-total').html();
         // set selected boarding and dropping.
         $(function () {
            var sBoarding = $('#s-boarding');
            sBoarding.attr("data-id", boarding.data('id'));
            sBoarding.find('.location').html(boarding.data('location'));
            sBoarding.find('.address').html(boarding.data('address'));

            var sDropping = $('#s-dropping');
            sDropping.attr("data-id", dropping.data('id'));
            sDropping.find('.location').html(dropping.data('location'));
            sDropping.find('.address').html(dropping.data('address'));
         });
      });
      modal.find('#passengers').html(generatePassengerForm());
      modal.find('#seats-wrapper, #select-boarding-dropping, #book-btn-wrapper').hide();
      modal.find('#enter-detail-buttons, #payment-wrapper, #boarding-dropping-selected, #booking-steps').show();
   }

   function step3(schedule, modal) {

      function retrieveDetails(modal) {
         var info = modal.find("#booking-info");
         bookingParams.booker = {
            "name": info.find('[name="name"]').val(),
            "email": info.find('[name="email"]').val(),
            "phone": info.find('[name="phone"]').val(),
            "requests": info.find('[name="additional"]').val(),
            // "recipients" : info.find('[name="recipients"]').val()
         };
         var passengers = modal.find("#passengers");
         $.each(bookingParams.seats, function (i, seat) {
            seat.passenger = {
               "name": passengers.find("#passenger-" + seat.id + "-name").val(),
               "age": passengers.find("#passenger-" + seat.id + "-age").val(),
               "gender": passengers.find("#passenger-" + seat.id + "-gender").val(),
            };
         });

      }

      function makePayment() {
         bookingParams.payment = {
            "transaction-id": "",
            "mode": ""
         };
      }

      var form = modal.find('#booking-form');
      var validator = form.validate();
      if (form.valid()) {
         retrieveDetails(modal);

         makePayment();

         // console.log(bookingParams);


         bookTicket(schedule, modal, bookingParams);

      } else {
         validator.focusInvalid();
      }
   }

   $(document).ready(function ($) {


            var modal = $('#booking-modal');
            var content = $('#booking-content').html();

            $('.search-list').on('click', function () {
               var btn = $(this).find('.select-seat');
               // btn.find('.txt').toggle();
               btn.find('.txt').hide();
               btn.find('.loader').show();
               btn.addClass('bg-danger');

               // btn.attr('disabled', 'disabled').toggleClass('disabled');
               var id = $(this).data('id');

               $.ajax({
                  url: baseUrl + '/api/book/request-schedule',
                  async: false,
                  type: 'post',
                  data: {
                     id: id
                  },
                  success: function (response) {
                     schedule = response;
                     if (typeof schedule === 'object' && $.isEmptyObject(schedule) === false) {
                        afterSuccess(modal, schedule, btn);
                        initModal(btn, modal, schedule, content);
                     } else {
                        schedule = [];
                     }
                  },
                  error: function (responseJSON) {
                     notify(responseJSON, 'danger');
                     schedule = [];
                  }
               });
            });

            /* == == = Booking Form = == ==*/

         }
   );
}(jQuery, baseUrl, constants));