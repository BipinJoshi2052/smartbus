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
   $(function () {
      $('.submit-contact').on("click", function (e) {
         var form = $("#contact-form");
         var validator = form.validate();
         e.preventDefault();

         if (form.valid()) {
            $.ajax({
               url: baseUrl + "/site/message",
               type: 'post',
               data: {
                  contact:
                        {
                           'name': form.find('[name="name"]').val(),
                           'email': form.find('[name="email"]').val(),
                           'phone': form.find('[name="phone"]').val(),
                           'message': form.find('[name="message"]').val()
                        }
               },
               success: function (data) {
                  // console.log(data);
                  // alert(data);
                  if (data === 'false') {
                     swal({
                        title: "Oops!",
                        text: "Sorry! Your message couldn`t be sent.!",
                        icon: "error",
                        button: "OK!",
                     });
                     // $('.response').removeClass('hidden');
                     // $('.response').html('<h5>Sorry! Your message couldn`t be sent.</h5>');

                  } else {
                     // $('.response').removeClass('hidden');
                     // $('.response')  .html('<h5>Your Message has been sent.</h5>');
                     $('.submit-contact').addClass('disabled');

                     swal({
                        title: "Message Sent!",
                        text: "Your message has been sent!",
                        icon: "success",
                        button: "OK!",
                     });
                  }
               },
               error: function () {
                  swal({
                     title: "Server Error!",
                     text: "Your message could not be sent!",
                     icon: "error",
                     button: "OK!",
                  });
               }
            });
         } else {
            validator.focusInvalid();
         }
      });
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


   $(function () {

   });
   // Select 2

   $(function () {
      if ($('[data-plugin="select2"]').length) {
         $('[data-plugin="select2"]').select2({
            'width': '100%',
         });
      }
   });
   $(function () {

      $('#repeat').keyup(function(){
         if ($('#repeat').val() !== $('#password').val()) {
            $(".password-match").html("Password do not match").css("color","red");
         }else{
            $(".password-match").html("Password matched").css("color","green");
            $('.password-btn').prop("disabled", false);
         }
      });
   });
   $(function () {
      $('#password').keyup(function () {
         $('#result').html(checkPasswordStrength($('#password').val()));
      });

      function checkPasswordStrength(password) {
         var strength = 0;
         if (password.length < 6) {
            $('#result').removeClass();
            $('#result').addClass('short');
            return 'Too short';
         }
         if (password.length > 7) {
            strength += 1;
         }
         if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
            strength += 1;
         }
         if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
            strength += 1;
         }
         if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
            strength += 1;
         }
         if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) {
            strength += 1;
         }
         if (strength < 2) {
            $('#result').removeClass();
            $('#result').addClass('weak');
            return 'Weak';
         } else if (strength === 2) {
            $('#result').removeClass();
            $('#result').addClass('good');
            return 'Good';
         } else {
            $('#result').removeClass();
            $('#result').addClass('strong');
            return 'Strong';
         }


      }

   });
});