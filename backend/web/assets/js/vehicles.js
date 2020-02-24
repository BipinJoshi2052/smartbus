$(function () {
   function drag(x) {
      "use strict";
      var c = '#seating-layout';
      x.draggable({
         containment: c,
         scroll: false,
         position: "absolute",
         cursor: "move",
         // cursorAt: {bottom: 0, right: 0}
      });
      x.resizable({
         containment: c,
         handles: "se",
         autoHide: true,
         minHeight: 24,
         minWidth: 24,
         // helper: "ui-resizable-helper"
         // grid: 30
      });
   }

   function initRemoveSeat() {
      layout.find('.seat').on('dblclick', function (e) {
         e.stopPropagation();
         $(this).remove();
      });
   }

   function removeSeat(seat) {
      seat.remove();
   }

   function addSeat(layout) {
      var seatCount = layout.find('.seat').length + 1;
      var html = $('<div class="seat-wrapper seat" style="position: absolute" data-plugin="drag" data-id="' + seatCount + '" data-name="' + (seatCount + 1) + '" data-status="1" data-reservation="0">' + seatCount + '</div>');
      drag(html);
      layout.find('.seats').append(html);
      //   initRemoveSeat();
      drag(html);
      return html;
   }

   function editSeat(layout) {

      var seat = $(this);
      // console.log(seat);


   }

   function checkSeatName(name) {
      var a = true;
      $('.seats .seat').each(function () {
         if ($(this).data('name') == name) {
            a = false;
         }
      });
      if (a) {
         $('#seat-error').html('<i class="mdi mdi-check success"></i>').removeClass('danger').addClass('success');
      } else {
         $('#seat-error').html('<i class="mdi mdi-close danger"></i> Name already taken').removeClass('success').addClass('danger');
      }
      return a;
   }

   function inputSeatInfo(seat) {
      var sidebar = $(".right-sidebar");
      $('.seat').removeClass('selected-seat');
      seat.addClass('selected-seat');
      sidebar.find('#seat-id').val((seat.data('seat')) ? seat.data('seat') : seat.index());
      sidebar.find('#seat-name').val((seat.data('name')) ? seat.data('name') : (seat.index() + 1));
      // alert(seat.data('reservation'));
      sidebar.find('#seat-status option[value="' + ((seat.data('status')) ? seat.data('status') : 0) + '"]').prop('selected', true);
      sidebar.find('#seat-reservations  option[value="' + ((seat.data('reservation')) ? seat.data('reservation') : 0) + '"]').prop('selected', true);

      sidebar.find('#seat-name').on('change', function () {
         if (checkSeatName($(this).val())) {
            var n = $(this).val();
            seat.html(n);
            seat.attr('data-name', n);
            // ($(this).val());
         }
      });
      sidebar.find('#seat-status').on('change', function () {
         console.log(seat);
         seat.attr('data-status', $(this).val());

      });
      sidebar.find('#seat-reservations').on('change', function () {
         seat.attr('data-reservation', $(this).val());
      });

      sidebar.slideDown(50).addClass("shw-rside");


   }


   function updateLayout(layout) {
      var count = layout.find('.seat').length;
      if (count > 0) {
         var seats = {
            vehicle: layout.data('vehicle'),
            layout: [],
         };
         layout.find('.seat').each(function () {
            seats.layout.push({
               id: $(this).data('seat'),
               name: $(this).data('name'),
               position: {
                  left: $(this).css('left'),
                  top: $(this).css('top')
               },
               size: {
                  width: $(this).css('width'),
                  height: $(this).css('height')
               },
               status: $(this).data('status'),
               reservation: $(this).data('reservation')
            });
         });
         //   console.log(seats);
         $.ajax({
            url: baseUrl + "/vehicles/update-seats",
            type: 'post',
            data: {
               seats: seats
            },
            success: function (data) {

               if (data === 'true') {
                  notify('Seat Structure Updated', 'success');
               } else {
                  notify('Sorry, Please try again.', 'danger');
               }
            },
            error: function () {
               notify('Sorry, Server Error. Please try again.', 'danger');
            }
         });
      } else {
         notify('No seats found.', 'danger')
      }
   }

   // $('[data-plugin="drag"]').draggable();
   // $('[data-plugin="resize"]').resizable();
   var layout = $('.seating .seating-layout');
   drag($('[data-plugin="drag"]'));
   //  initRemoveSeat();
   // resize($('[data-plugin="drag"]'));

   $('.seat').on('click', function () {
      var seat = $(this);
      inputSeatInfo(seat);
      inputSeatInfo(seat);
   });
   $('#add-seat').on('click', function () {
      var seat = addSeat(layout);

      // inputSeatInfo(seat)
      //    initRemoveSeat();
      inputSeatInfo(seat);
   });


   $('#update-layout').on("click", function () {
      updateLayout($('#seating-layout'));
   });
});
$(function () {
   function drag(x) {
      "use strict";
      var c = '#seating-layout';
      x.draggable({
         containment: c,
         scroll: false,
         position: "absolute",
         cursor: "move",
         // cursorAt: {bottom: 0, right: 0}
      });
      x.resizable({
         containment: c,
         handles: "se",
         autoHide: true,
         minHeight: 24,
         minWidth: 24,
         // helper: "ui-resizable-helper"
         // grid: 30
      });
   }

   function initRemoveSeat() {
      layout.find('.seat').on('dblclick', function (e) {
         e.stopPropagation();
         $(this).remove();
      });
   }

   function removeSeat(seat) {
      seat.remove();
   }

   function addSeat(layout) {
      var seatCount = layout.find('.seat').length + 1;
      var html = $('<div class="seat-wrapper seat" style="position: absolute" data-plugin="drag" data-id="' + seatCount + '" data-name="' + (seatCount + 1) + '" data-status="1" data-reservation="0">' + seatCount + '</div>');
      drag(html);
      layout.find('.seats').append(html);
      //   initRemoveSeat();
      drag(html);
      return html;
   }

   function editSeat(layout) {

      var seat = $(this);
      // console.log(seat);


   }

   function checkSeatName(name) {
      var a = true;
      $('.seats .seat').each(function () {
         if ($(this).data('name') == name) {
            a = false;
         }
      });
      if (a) {
         $('#seat-error').html('<i class="mdi mdi-check success"></i>').removeClass('danger').addClass('success');
      } else {
         $('#seat-error').html('<i class="mdi mdi-close danger"></i> Name already taken').removeClass('success').addClass('danger');
      }
      return a;
   }

   function inputSeatInfo(seat) {
      var sidebar = $(".right-sidebar");
      $('.seat').removeClass('selected-seat');
      seat.addClass('selected-seat');
      sidebar.find('#seat-id').val((seat.data('seat')) ? seat.data('seat') : seat.index());
      sidebar.find('#seat-name').val((seat.data('name')) ? seat.data('name') : (seat.index() + 1));
      // alert(seat.data('reservation'));
      sidebar.find('#seat-status option[value="' + ((seat.data('status')) ? seat.data('status') : 0) + '"]').prop('selected', true);
      sidebar.find('#seat-reservations  option[value="' + ((seat.data('reservation')) ? seat.data('reservation') : 0) + '"]').prop('selected', true);

      sidebar.find('#seat-name').on('change', function () {
         if (checkSeatName($(this).val())) {
            var n = $(this).val();
            seat.html(n);
            seat.attr('data-name', n);
            // ($(this).val());
         }
      });
      sidebar.find('#seat-status').on('change', function () {
         console.log(seat);
         seat.attr('data-status', $(this).val());

      });
      sidebar.find('#seat-reservations').on('change', function () {
         seat.attr('data-reservation', $(this).val());
      });

      sidebar.slideDown(50).addClass("shw-rside");


   }


   function updateLayout(layout) {
      var count = layout.find('.seat').length;
      if (count > 0) {
         var seats = {
            vehicle: layout.data('vehicle'),
            layout: [],
         };
         layout.find('.seat').each(function () {
            seats.layout.push({
               id: $(this).data('seat'),
               name: $(this).data('name'),
               position: {
                  left: $(this).css('left'),
                  top: $(this).css('top')
               },
               size: {
                  width: $(this).css('width'),
                  height: $(this).css('height')
               },
               status: $(this).data('status'),
               reservation: $(this).data('reservation')
            });
         });
         //   console.log(seats);
         $.ajax({
            url: baseUrl + "/vehicles/update-seats",
            type: 'post',
            data: {
               seats: seats
            },
            success: function (data) {

               if (data === 'true') {
                  notify('Seat Structure Updated', 'success');
               } else {
                  notify('Sorry, Please try again.', 'danger');
               }
            },
            error: function () {
               notify('Sorry, Server Error. Please try again.', 'danger');
            }
         });
      } else {
         notify('No seats found.', 'danger')
      }
   }

   // $('[data-plugin="drag"]').draggable();
   // $('[data-plugin="resize"]').resizable();
   var layout = $('.seating .seating-layout');
   drag($('[data-plugin="drag"]'));
   //  initRemoveSeat();
   // resize($('[data-plugin="drag"]'));

   $('.seat').on('click', function () {
      var seat = $(this);
      inputSeatInfo(seat);
      inputSeatInfo(seat);
   });
   $('#add-seat').on('click', function () {
      var seat = addSeat(layout);

      // inputSeatInfo(seat)
      //    initRemoveSeat();
      inputSeatInfo(seat);
   });


   $('#update-layout').on("click", function () {
      updateLayout($('#seating-layout'));
   });
});