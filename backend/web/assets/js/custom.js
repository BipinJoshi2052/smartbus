function readURL(input) {
   "use strict";
   if (input.files && input.files[0]) {
      var id = $(input).attr('id');
      var file = input.value;
      var filename = file.substr(file.lastIndexOf('\\') + 1).split('.')[0];
      var extension = file.split('.')[1];
      var reader = new FileReader();

      reader.onload = function (e) {
         $('#' + id + '-image')
               .attr('src', e.target.result)
               .css('visibility', 'visible');
         $('#' + id + '-label span').html(filename + '.' + extension);
      };
      reader.readAsDataURL(input.files[0]);
   }
}

function sendAjax(url, data) {
   $.ajax({
      url: baseUrl + url,
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

function updateMap(input) {
   "use strict";
   if (input.files && input.files[0]) {
      var imageHolder = $('#seating-layout .seat-map img');
      var obj = $(input);
      var file = input.value;
      var filename = file.substr(file.lastIndexOf('\\') + 1).split('.')[0];
      var extension = file.split('.')[1];
      var reader = new FileReader();

      reader.onload = function (e) {
         imageHolder.attr('src', e.target.result);
         obj.parents('.custom-file').find('.custom-file-label span').html(filename + '.' + extension);
      };
      reader.readAsDataURL(input.files[0]);
   }
}

function resize(x) {
   x.resizable({
      containment: "#seating-layout",
      handles: "se",
      minHeight: 24,
      minWidth: 24
      // grid: 30
   });
}


String.prototype.ucwords = function () {
   str = this.toLowerCase();
   return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
         function (s) {
            return s.toUpperCase();
         });
};

function removeRow(object) {
   $(object).on('click', function () {
      var row = $(this).parents('tr');
      row.html('').hide();

   });
}

function toggleStatus() {
   $('body').on('click', '.toggle-status', function () {

      var id = $(this).data("a");
      var table = $(this).data("b");
      var txt = ($(this).html() === 'Active') ? 'Deactivated' : 'Activated';

      if (id > 0 && table != '') {
         $.ajax({
            url: baseUrl + "/site/toggle-status",
            type: 'post',
            data: {
               id: id,
               table: table
            },
            success: function (data) {
               if (data === 'true') {
                  notify(txt + 'Activated', 'success');
               } else {
                  notify('Sorry, Please try again.', 'danger');
               }
            },
            error: function () {
               notify('Sorry, Server Error. Please try again.', 'danger');
            }
         });
      }

   });
}

function formatText(icon) {
   "use strict";
   // / console.log(icon);
   return $('<span class="d-inline-block option-icon"><i class="' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
};

function notify(message, type) {
   jQuery.notify({
      // options
      message: message
   }, {
      // settings
      type: type,
      allow_dismiss: true,
      arrowShow: true,
      // arrow size in pixels
      arrowSize: 5,
      newest_on_top: true,
      placement: {
         from: "top",
         align: "right"
      },
      delay: 3000,
      timer: 1000,
      animate: {
         enter: 'animated fadeInDown',
         exit: 'animated fadeOutUp'
      },
      template: '<div data-notify="container" class="notify_container alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span class="data-notify-message" data-notify="message">{2}</span>' +
            '</div>'
   });
}

$(document).ready(function ($) {

   "use strict";


   function timepicker(element) {
      element.timepicker({
         // template: false,
         showInputs: false,
         minuteStep: 1,
         showMeridian: false,
         showSeconds: false,
         defaultTime: '00:00'
      });
   }

   function getRouteStations(type) {
      var routes = $('.route-table').find('table tbody');
      var pt = {
         'from': [],
         'to': [],
      };

      routes.find('tr').each(function () {
         var row = $(this);
         var d = (row.find('select').select2('data'));
         var data = false;
         if (typeof (d[0]) !== 'undefined' && d[0].id > 0) {
            data = d[0];
         }
         if (row.find('td').eq(2).find('input[type="checkbox"]').prop('checked') && data !== false) {
            pt.from.push({
               'id': data.id,
               'text': data.name,
               'description': data.description
            });
         }
         if (row.find('td').eq(3).find('input[type="checkbox"]').prop('checked') && data !== false) {
            pt.to.push({
               'id': data.id,
               'text': data.name,
               'description': data.description
            });
         }
      });
      if (type === 'from') {
         return pt.from;
      } else if (type === 'to') {
         return pt.to;
      }
      return pt;
   }

   function getAllStations() {
      var routes = $('.route-table').find('table tbody');
      var pt = [];

      routes.find('tr').each(function () {
         var row = $(this);
         var d = (row.find('.location').select2('data'));
         var data = false;
         if (typeof (d[0]) !== 'undefined' && d[0].id > 0) {
            data = d[0];
         }
         if (data !== false && (row.find('.boarding').prop('checked') || row.find('.dropping').prop('checked'))) {
            console.log(data);
            pt.push({
               'id': data.id,
               'text': data.text,
               'description': data.title,
               'boarding': (row.find('.boarding').prop('checked')) ? 1 : 0,
               'dropping': (row.find('.dropping').prop('checked')) ? 1 : 0
            });
         }
      });
      return pt;
   }


// Select2 Ajax
   function getLocations(select, city) {

      var l = (city) ? 'cities' : 'places';

      select.select2({
         ajax: {
            url: baseUrl + '/api/search/' + l,
            dataType: 'json',
            delay: 250,
            data: function (params) {
               return {
                  term: params.term // search term
               };
            },
            processResults: function (data, params) {
               return {
                  results: (data)
               };
            },
            cache: true
         },
         //    tags: (city) ? true : false,
         placeholder: 'Search for a ' + ((city) ? 'city' : 'place'),
         width: '100%',
         escapeMarkup: function (markup) {
            return markup;
         }, // let our custom formatter work
         minimumInputLength: 1,
         templateResult: function (result) {
            if (result.loading) {
               return result.text;
            }
            var markup = '<div class="select2-result-location clearfix">' +
                  '<div class="select2-result">' +
                  '<div class="select2-result-title">' + result.name + '</div>';
            if (result.description) {
               markup += '<div class="select2-result-description">' + result.description + '</div>';
            }
            return markup;
         },
         templateSelection: function formatSelection(result) {
            return result.name || result.text;
         }
      });

      /*   function formatData(result) {
            if (result.loading) {
               return result.text;
            }
            var markup = '<div class="select2-result-location  clearfix">' +
                  '<div class="select2-result">' +
                  '<div class="select2-result-title">' + result.name + '</div>';

            if (result.description) {
               markup += '<div class="select2-result-description">' + result.description + '</div>';
            }
            return markup;
         }

         function formatSelection(result) {
            return result.name || result.text;
         }*/
   }

   $(function () {
      $(".preloader").fadeOut();
   });

   $(function () {
      $(document).on("click", ".mega-dropdown", function (i) {
         i.stopPropagation();
      });
   });

   $(function () {
      $('[data-toggle="tooltip"]').tooltip();
   });

   $(function () {
      $('[data-toggle="popover"]').popover();
   });

   $(function () {
      $("#sidebarnav").metisMenu();
   });

   $(function () {
      $(".scroll-sidebar").slimScroll({
         position: "left",
         size: "5px",
         height: "100%",
         color: "#DCDCDC"
      });
   });

   $(function () {
      // $(".message-center").slimScroll({
      //    position: "right",
      //    size: "5px",
      //    color: "#dcdcdc"
      // });
   });

   $(function () {
      $(".aboutscroll").slimScroll({
         position: "right",
         size: "5px",
         height: "80",
         color: "#DCDCDC"
      });
   });

   $(function () {
      $(".message-scroll").slimScroll({
         position: "right",
         size: "5px",
         height: "570",
         color: "#DCDCDC"
      });
   });

   $(function () {
      $(".chat-box").slimScroll({
         position: "right",
         size: "5px",
         height: "470",
         color: "#DCDCDC"
      });
   });

   $(function () {
      $(".slimscrollright").slimScroll({
         height: "100%",
         position: "right",
         size: "5px",
         color: "#DCDCDC"
      });
   });

   $(function () {
      $("body").trigger("resize");
   });

   $(function () {
      $(".list-task li label").click(function () {
         $(this).toggleClass("task-done");
      });
   });

   $(function () {
      $("#to-recover").on("click", function () {
         $("#loginform").slideUp();
         $("#recoverform").fadeIn();
      });
   });

   $(function () {
      $('a[data-action="collapse"]').on("click", function (i) {
         i.preventDefault();
         $(this).closest(".card").find('[data-action="collapse"] i').toggleClass("ti-minus ti-plus");
         $(this).closest(".card").children(".card-body").collapse("toggle");
      });
   });

   $(function () {
      $('a[data-action="expand"]').on("click", function (i) {
         i.preventDefault();
         $(this).closest(".card").find('[data-action="expand"] i').toggleClass("mdi-arrow-expand mdi-arrow-compress");
         $(this).closest(".card").toggleClass("card-fullscreen");
      });
   });

   $(function () {
      $('a[data-action="close"]').on("click", function () {
         $(this).closest(".card").removeClass().slideUp("fast");
      });
   });

   $(function () {
      $('.js-switch').each(function () {
         new Switchery($(this)[0], $(this).data());
      });
   });

   $(function () {
      $(".select2").select2({
         width: "100%",
      });
   });

   $(function () {
      $('.selectpicker').selectpicker();
   });

   $(function () {
      $('.data-table, [data-plugin="datatable"]').DataTable({
         "displayLength": 25,
         "lengthMenu": [[25,50, 100, 200, 500, -1], [25,50, 100, 200, 500, "All"]],
         "aaSorting": [],
         "columnDefs": [
            {"orderable": false, "targets": [-1]}
         ]
      });
   });

   if ($('.delete-message').length) {
      $('.delete-message').on("click", function () {
         var cid = $(this).data("id");
         swal({
                  title: "Delete Message ?",
                  text: "Are you sure, you want to delete this Message.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr("data-id");
                     $.ajax({
                        url: baseUrl + "/messages/delete",
                        type: 'post',
                        data: {
                           id: cid,
                        },
                        success: function (data) {
                           if (data === 'false') {
                              typeAlert('Error', 'Sorry, Could not delete Message', 'error');
                           } else {
                              typeAlert('Success', 'Message Deleted.', 'success');
                              location.reload();
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-client').length) {
      $('.delete-client').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Client ?",
                  text: "Are you sure, you want to delete this client.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr("data-id");
                     $.ajax({
                        url: baseUrl + "/clients/delete",
                        type: 'post',
                        data: {
                           id: cid,
                        },
                        success: function (data) {
                           if (data === 'false') {
                              typeAlert('Error', 'Sorry, Could not delete Client', 'error');
                           } else {
                              typeAlert('Success', 'Client Deleted.', 'success');
                              location.reload();
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }

   if ($('.delete-item').length) {
      $('.delete-item').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Blog ?",
                  text: "Are you sure, you want to delete this blog.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr("data-id");
                     $.ajax({
                        url: baseUrl + "/blog/delete",
                        type: 'post',
                        data: {
                           id: cid,
                        },
                        success: function (data) {
                           if (data === 'false') {
                              typeAlert('Error', 'Sorry, Could not delete Message', 'error');
                           } else {
                              typeAlert('Success', 'Message Deleted.', 'success');
                              location.reload();
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-vacancy').length) {
      $('.delete-vacancy').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Blog ?",
                  text: "Are you sure, you want to delete this Vacancy.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr("data-id");
                     $.ajax({
                        url: baseUrl + "/careers/delete",
                        type: 'post',
                        data: {
                           id: cid,
                        },
                        success: function (data) {
                           if (data === 'false') {
                              typeAlert('Error', 'Sorry, Could not delete Vacancy', 'error');
                           } else {
                              typeAlert('Success', 'Vacancy Deleted.', 'success');
                              location.reload();
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-blog-category').length) {
      $('.delete-blog-category').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Blog Category ?",
                  text: "Are you sure, you want to Delete this category.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/blog/delete-blog-category",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'Blog Category Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete Category', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-slider').length) {
      $('.delete-slider').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Slider ?",
                  text: "Are you sure, you want to Delete this Slider.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     console.log($id);
                     $.ajax({
                        url: baseUrl + "/slider/delete",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'Slider Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete Slider', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-client-page-management').length) {
      $('.delete-client-page-management').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete News Category ?",
                  text: "Are you sure, you want to Delete this Page.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/clients/delete-clients",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'Page  Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete Page', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }

   if ($('.delete-news-category').length) {
      $('.delete-news-category').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete News Category ?",
                  text: "Are you sure, you want to Delete this category.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/news/delete-news-category",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'News Category Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete Category', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }
   if ($('.delete-news').length) {
      $('.delete-news').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete News ?",
                  text: "Are you sure, you want to Delete this album.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/news/delete",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'News Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete News', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }

   if ($('.delete-add').length) {
      $('.delete-add').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete News ?",
                  text: "Are you sure, you want to Delete this Advertisement.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/advertisement/delete",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'Advertisement Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete Advertisement', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }


   if ($('.delete-testimonial').length) {
      $('.delete-testimonial').on("click", function () {
         var cid = $(this).data("id");
         var table = $(this).data("table");
         swal({
                  title: "Delete Testimonial ?",
                  text: "Are you sure, you want to Delete this testimonial.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it",
                  cancelButtonText: "Cancel",
                  closeOnConfirm: false,
                  closeOnCancel: true
               },
               function (isConfirm) {
                  if (isConfirm) {
                     var $this = $(this);
                     var $id = $(this).attr('data-id');
                     $.ajax({
                        url: baseUrl + "/testimonials/delete",
                        type: 'post',
                        data: {
                           id: cid
                        },
                        success: function (data) {
                           if (data === 'true') {
                              typeAlert('Success', 'testimonial Deleted.', 'success');
                              location.reload();
                           } else {
                              typeAlert('Error', 'Sorry, Could not delete testimonial', 'error');
                           }
                        },
                        error: function () {
                           typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                     });
                  }
               });

      });
   }


   if ($('[data-plugin="summernote-advanced"]').length) {
      $('[data-plugin="summernote-advanced"]').summernote({
         height: 350,
         minHeight: null,
         maxHeight: null,
         focus: false,
         toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen']]
         ],
         fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '28', '36', '42', '48', '64'],
         colors: [
            ['#535353', '#FEE073', '#FCCD09', '#FFFFFF'],
            ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
            ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
            ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'],
            ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'],
            ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'],
            ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'],
            ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'],
            ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']
         ],
         lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '2.25', '2.5', '2.75', '3.0', '3.25', '3.5', '3.75', '4.0'],

      });
   }

   if ($('[data-plugin="summernote"]').length) {
      $('[data-plugin="summernote"]').summernote({
         height: 350,
         minHeight: null,
         maxHeight: null,
         focus: false,
         toolbar: [
            ['font', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'clear']],
            ['para', ['height']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
         ],

         fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '28', '36', '42', '48', '64'],
         colors: [
            ['#535353', '#FEE073', '#FCCD09', '#FFFFFF'],
            ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
            ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
            ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'],
            ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'],
            ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'],
            ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'],
            ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'],
            ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']
         ],
         lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '2.25', '2.5', '2.75', '3.0', '3.25', '3.5', '3.75', '4.0'],
      });
   }

   if ($('.remove-image').length) {
      $('.remove-image').on("click", function () {
         var parent = $(this).parents('.custom-file');
         var $this = $(this);
         var imgAct = $(this).parents('.image-actions');
         var imageHolder = $(this).parents('.page-image');
         $.ajax({
            'url': baseUrl + '/site/remove',
            'method': 'post',
            'data': {
               'tab': $this.data('tab'),
               'id': $this.data('id'),
            },
            'success': function (result) {
               if (!result == 'true') {
                  notify('Sorry File Not Removed', 'danger');
               } else {
                  notify('File Removed', 'success');
                  parent.find('.custom-file-input-image').attr('src', '');
                  imgAct.remove();
                  imageHolder.remove();
                  console.log('b');
               }
            },
            'error': function (error) {
               notify('Server Error. Sorry File Not Removed', 'danger');
            }


         });

      });
   }

   if ($('.add-social-media-item').length) {
      $('.add-social-media-item').on('click', function () {
         var media = $(this).parents('.social-media-wrapper').find('.social-media-item').eq(0).clone();
         media.find('select').selectedIndex = -1;
         media.find('input').val = '';
         $(this).parents('.social-media-wrapper').find('.social-media-container').append(media);
         // console.log(media);
      });
   }

   //Select 2
   if ($('[data-plugin="select2"]').length) {
      $('[data-plugin="select2"]').select2();
   }
   $(function (){
      $('.refresh').on("click", function () {
         location.reload();
      })

   });
   $(function () {
      $('.noti-mess').on("click", function () {
         var cid = $('.new-mess').data("id");
         var unseen = cid-1;
         console.log(unseen);
         // $.ajax({
         //    url: baseUrl + "/messages/read-message",
         //    type: 'post',
         //    data: {
         //       id: cid
         //    },
         //    success: function (data) {
         //       console.log(data);
         //       if (data === '') {
         //          typeAlert('Error', 'Sorry, Could not open Message', 'error');
         //       } else {
         //          var a = JSON.parse(data);
         //
         //          if ($('[data-for="new"]')) {
         //             $('[data-id="id' + a['id'] + '"]').html('<span data-for="seen" class="label label-danger">Seen</span>');
         //          } else {
         //             $('[data-id="id' + a['id'] + '"]').html('<span data-for="new" class="label label-danger">New</span>');
         //
         //          }
         //          $('.modal').modal('show');
         //          $('.modal-dialog').html(a['result']);
         //          $('.refresh').removeClass('hidden')
         //       }
         //    },
         //    error: function () {
         //       typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
         //    }
         // });

      });
   });
   $(function () {
      $('.show-message').on("click", function () {
         var cid = $(this).data("id");
         var modal = $('.modal-message');
         $.ajax({
            url: baseUrl + "/messages/read-message",
            type: 'post',
            data: {
               id: cid
            },
            success: function (data) {
               console.log(data);
               if (data === '') {
                  typeAlert('Error', 'Sorry, Could not open Message', 'error');
               } else {
                  var a = JSON.parse(data);
                  //message seen or new
                  if ($('[data-for="new"]')) {
                     $('[data-id="id' + a['id'] + '"]').html('<span data-for="seen" class="label label-danger">Seen</span>');
                  } else {
                     $('[data-id="id' + a['id'] + '"]').html('<span data-for="new" class="label label-danger">New</span>');
                  }

                  modal.find('.modal-dialog').html(a['result']);
                 modal.modal('show');
                  $('.refresh').removeClass('hidden')
               }
            },
            error: function () {
               typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
            }
         });

      });
   });
   // Datepicker
   $(function () {
      if ($('[data-plugin="datepicker"]').length) {
         $('[data-plugin="datepicker"]').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            orientation: 'bottom',
            startDate: '+0d'
         });
      }
      if ($('[data-plugin="datepicker-limited"]').length) {
         $('[data-plugin="datepicker-limited"]').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            orientation: 'bottom',
            startDate: '+0d',
            endDate: '+90d',

         });
      }


   });

   // Timepicker
   $(function () {


      if ($('[data-plugin="timepicker"]').length) {
         timepicker($('[data-plugin="timepicker"]'));
      }
   });
   //Load on selected location names


   // Seat row change

   $(function () {
      if ($('#seat-map').length) {
         $('#seat-map').on('change', function () {

            $('#seating-layout')
                  .css('height', $(this).find('option:selected').data('height'))
                  .css('width', $(this).find('option:selected').data('width'));
         });
      }


   });

   // get location and cities
   $(function () {
      if ($('[data-plugin="cities-ajax"]').length) {
         getLocations($('[data-plugin="cities-ajax"]'), true);
      }
      if ($('[data-plugin="locations-ajax"]').length) {
         getLocations($('[data-plugin="locations-ajax"]'));
      }
   });

   // Add Route in Schedule
   $(function () {
      removeRow($('.remove-location'));
      removeRow($('.remove-price'));
      if ($('.add-route-location').length) {
         $('.add-route-location').on('click', function () {
            $('.route-table table').show();
            var table = $('.route-table').find('table tbody');
            var row_count = (table.find('tr').length);
            var html = '<tr>' +
                  '<td class="has-select">' +
                  '<select name = "schedule[route][' + row_count + '][location]" class = "form-control required" data-plugin = "locations-ajax"></select>' +
                  '</td>' +
                  '<td class="has-time"><input type="time" name = "schedule[route][' + row_count + '][time]" class = "form-control"></td>' +
                  '<td class="has-description"><input name = "schedule[route][' + row_count + '][description]" class = "form-control"></td>' +
                  '<td class="has-checkbox">' +
                  '<input type = "checkbox" name = "schedule[route][' + row_count + '][boarding]" id = "chk-1-' + row_count + '"><label for = "chk-1-' + row_count + '"></label>' +
                  '</td>' +
                  '<td class="has-checkbox">' +
                  '<input type = "checkbox" name = "schedule[route][' + row_count + '][dropping]" id = "chk-2-' + row_count + '"><label for = "chk-2-' + row_count + '"></label>' +
                  '</td>' +
                  '<td class="has-actions"><a href="javascript:void(0);" class="remove-location"><i class="mdi mdi-close"></i></a></td>' +
                  '</tr>';
            var content_body = $(html);
            var select = content_body.find('[data-plugin="locations-ajax"]');
            getLocations(select, false);
            // timepicker(content_body.find('[data-plugin="timepicker"]'));

            removeRow(content_body.find('.remove-location'));

            $('.route-table table tbody').append(content_body);

         });

         /*     $('.add-price').on('click', function () {
                 var t = $('.price-table');
                 var table = t.find('table tbody');
                 var stations = getRouteStations();

                 //     console.log(stations);


                 if (stations.from.length > 0 && stations.to.length > 0) {
                    t.find('table').show();
                    var row_count = (table.find('tr').length);
                    var html = '<tr>' +
                          '<td>' +
                          '<select name = "schedule[price][' + row_count + '][from]" class = "form-control required"></select>' +
                          '</td>' +
                          '<td>' +
                          '<select name = "schedule[price][' + row_count + '][to]" class = "form-control required"></select>' +
                          '</td>' +
                          '<td>' +
                          '<input type = "text" name = "schedule[price][' + row_count + '][amount]" class="form-control required">' +
                          '</td>' +
                          '<td><a href="javascript:void(0);" class="remove-price"><i class="mdi mdi-close"></i></a></td>' +
                          '</tr>';
                    var row = $(html);

                    row.find('td').eq(0).find('select').select2({
                       data: getRouteStations('from'),
                       placeholder: 'Location',
                       width: '100%',
                    });
                    row.find('td').eq(1).find('select').select2({
                       data: getRouteStations('to'),
                       placeholder: 'Location',
                       width: '100%',

                    });
                    removeRow(row.find('.remove-price'));
                    $('.price-table table tbody').append(row);
                 } else {
                    t.find('.card-body').prepend('<div class="temporary-alert alert"><i class="mdi mdi-close"></i>Please select boarding and dropping points first.</div>');
                    setTimeout(
                          function () {
                             $('.temporary-alert').remove();
                          }, 3000);
                 }
              });*/
      }
   });
//         Generate Pricing Table
   $(function () {
      $('.generate-pricing-table').on('click', function () {
         var t = $('.price-table');
         var table = t.find('table tbody');
         var stations = $(getAllStations());
         if (stations.length > 0) {
            var html = "";
            // var html = "<tr><td colspan='" + co + "'><span class='capitalize'>" + stations[0].text + "</span></td></tr>";
            var co = stations.length;
            stations.each(function (index, element) {
               html += "<tr>";
               var ha = 0;
               stations.each(function (ind, ele) {
                  if (index > ind) {
                     html += '<td>';
                     html += '<input type="number" class="form-control" name = "schedule[prices][' + index + '][' + ind + '][price]"/>';
                     html += '<input type="hidden" name = "schedule[prices][' + index + '][' + ind + '][from]" value="' + ele.id + '"/>';
                     html += '<input type="hidden" name = "schedule[prices][' + index + '][' + ind + '][to]" value="' + element.id + '"/>';
                     html += '</td>';
                  } else {
                     if (ha === 0) {
                        html += '<td colspan="' + (co - ind) + '">';
                        html += ele.text.ucwords();
                        html += '</td>';
                        ha++;
                     }
                  }
               });
               if (index === (index.length - 1)) {
                  html += "<td>" + stations[(stations.length - 1)].text + "</td>";
               }

               html += "</tr>";
            });
            table.html(html);
            t.find('table').show();
         }

         //console.log(stations);

         /*if (stations.length > 0 ) {
            t.find('table').show();
            var row_count = (table.find('tr').length);
            var html = "";


            var row = $(html);


            $('.price-table table tbody').append(row);
         } else {
            t.find('.card-body').prepend('<div class="temporary-alert alert"><i class="mdi mdi-close"></i>Please select boarding and dropping points first.</div>');
            setTimeout(
                  function () {
                     $('.temporary-alert').remove();
                  }, 3000);
         }*/
      });
   });

   //activate / deactivate item
   $(function () {
      if ($('.toggle-status').length > 0) {
         toggleStatus();
      }
   });

   // select 2 icons
   $(function () {
      if ($('[data-plugin="select2-icon"]').length) {
         $('[data-plugin="select2-icon"]').select2({
            width: "100%",
            templateSelection: formatText,
            templateResult: formatText
         });
      }
   });
   /*$(function () {
      if ($('.grid-stack').length) {
         var options = {
            // cellHeight: 100,
            // cellWidth: 100,
            verticalMargin: 10,
            resizable: {
               handles: 'none'
            }
         };
         $('.grid-stack').gridstack(options);
      }

   });*/


   /* $(function () {
       if ($('.seating #seat-map').length > 0) {
          var sMap = $('#seat-map');
          sMap.fileupload({
             url: baseUrl + "/vehicles/upload-seat-map",
             dataType: 'json',
             done: function (e, data) {
                if (data === 'true') {
                   notify('Image Uploaded', 'success');
                } else {
                   notify('Sorry, Please try again.', 'danger');
                }
             },
             progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                      'width',
                      progress + '%'
                );
             }
          }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

          sMap.bind('fileuploadsubmit', function (e, data) {
             data.formData = {'id': $('#vehicle').val()};
          });
       }
    });*/


   $(function () {

      $(function () {
         if ($('[data-plugin="datatable-cs"]').length > 0) {
            // DataTable
            var table = $('[data-plugin="datatable-cs"]').DataTable({
               "displayLength": 50,
               "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
               "aaSorting": [],
            });
            // Apply the search
            table.columns().eq(0).each(function (colIdx) {
               $('input', table.column(colIdx).header()).on('keyup change', function () {
                  table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
               });
            });
         }


      });
      $(function () {

         $('table').on('dblclick', '.editable-content', function () {
            var element = $(this);
            var text = element.html();
            var html = $('<div class="input-group">' +
                  '<select  class="form-control">' +
                  '<option value="0">Forbidden</option>' +
                  '<option value="1">Allowed</option>' +
                  '</select>' +
                  '<div class="input-group-append">' +
                  '<button class="btn btn-success" type="button">Cancel</button>' +
                  '</div>' +
                  '</div>');
            html.find('select').on('change', function () {
               var select = $(this);
               var table = element.parents('table');

               var data = {
                  url: table.data('url'),
                  target: table.data('target'),
                  row: element.parents('tr').data('id'),
                  col: table.find('thead').find('tr').eq(0).find('th').eq(select.parents('td').index()).data('name'),
                  value: select.children("option:selected").val(),
               };

               var request = sendAjax(data.url, data);
               if (request === true) {
                  element.html(text);
               }
            });

            html.find('button').on('click', function () {
               element.html(text);
            });
            element.html(html);
         });
      });


   });


   if ($('.repeat-schedule').length) {
      $('.repeat-schedule').on('click', function () {
         var repeat = $('#repeat-schedule-modal');
         repeat.modal('show');
         $('#repeat-schedule').on('click', function () {
            repeat.modal('hide');
            notify('Schedule not Updated. Inconsistent Schedule', 'danger');
         });

      });
   }
   if ($(".right-side-toggle").length) {
      $(".right-side-toggle").click(function () {
         var s = $('.right-sidebar');
         s.slideDown(50, function () {
            $('.seat').removeClass('selected-seat');
            s.toggleClass("shw-rside");
         });

      });
   }
   if ($('[data-plugin="matchHeight"]').length) {
      $('[data-plugin="matchHeight"]').matchHeight({
         byRow: true,
         property: 'height',
         target: null,
         remove: false
      });
   }


});