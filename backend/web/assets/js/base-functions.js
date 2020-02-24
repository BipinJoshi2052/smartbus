/*
 function initooltips() {
 jQuery('.tooltips').tooltip({container: 'body'});
 }

 function createDateTime(a) {
 return a.replace(/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})$/, "$1$2$3$4$5$6");
 }

 function valuesToArray(obj) {
 return Object.keys(obj).map(function (key) { return obj[key]; });
 }
 */
function numberFormat(val) {
    var num = Math.round(Number(val) * 100) / 100;
    var parts = num.toString().split(".");
    return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (parts[1] ? "." + parts[1] : ".00");
}
function defaultNotify(type, title, icon, msg, modal) {

    content = '<div class="alert dark alert-alt alert-' + type + ' alert-dismissible" role="alert" style="margin: 30px 30px 0;">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">×</span>' +
        '</button>' +
        '<h4 class="alert-heading margin-bottom-10"><i class="ti-' + icon + '"></i>' + title + '</h4>' +
        '<p class="margin-bottom-10">' + msg + '</p>' +
        '</div>';

    m = '';
    if (modal) {
        m = '_modal';
    }
    $('.default_notify' + m).html(content);
}

function basicAlert(msgTitle, msgText) {
    swal({
        title: msgTitle,
        text: msgText,
        confirmButtonColor: "#007AFF"
    });
}


function typeAlert(msgTitle, msgText, msgType) {
    //type => "success" or "warning" or "info"
    swal({
        title: msgTitle,
        text: msgText,
        type: msgType,
        confirmButtonColor: "#007AFF"
    });
}

function typeAlertRedirect(msgTitle, msgText, msgType, url) {
    //type => "success" or "warning" or "info"
    swal({
        title: msgTitle,
        text: msgText,
        type: msgType,
        showCancelButton: false,
        confirmButtonColor: "#007AFF",
        confirmButtonText: "OK",
        closeOnConfirm: false
    }, function () {
        if (url != '') {
            window.location.href = url;
        } else {
            window.location.reload();
        }
    });
}


function basicConfirm(msgTitle, msgText, btnText, successTitle, successMsg) {

    swal({
        title: msgTitle,
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(0, 122, 255)",
        confirmButtonText: btnText,
        closeOnConfirm: false
    }, function () {
        swal(successTitle, successMsg, "success");
    });
}

function advConfirm(msgTitle, msgText, btnConfirmText, btnCancelText, successTitle, successMsg, cancelledTitle, cancelledMsg) {
    swal({
        title: msgTitle,
        text: msgText,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007AFF",
        confirmButtonText: btnConfirmText,
        cancelButtonText: btnCancelText,
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            swal(successTitle, successMsg, "success");
        } else {
            swal(cancelledTitle, cancelledMsg, "error");
        }
    });
}

function initEditable() {
    //defaults
    $.fn.editable.defaults.mode = 'popover'; //inline
    $.fn.editable.defaults.error = function (response) {
        var data = $.parseJSON(response);
        typeAlert('Error!', 'Sorry! Could not update the data at this time', 'warning');
    }

    $.fn.editable.defaults.display = function (value, response) {
        if (response != null) {
            var data = $.parseJSON(response);
            $(this).html(data.display_value);
            $(this).attr("data-params", "{old_value:'" + data.display_value + "'}"); // not working
        }
    }

    $.fn.editable.defaults.success = function (response) {
        var data = $.parseJSON(response);
        if (data.status == 'success') {
            typeAlert('Great', data.msg, 'success');
        }
        else {
            typeAlert('Error', data.msg, 'warning');
        }
    }

    $(function () {
        $('.editable-text').editable({
            validate: function (value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });

        $('.editable-number').editable({
            //mode: 'inline',
            validate: function (value) {
                if ($.trim(value) == '') {
                    return 'This field is required';
                }
                else if (isNaN($.trim(value))) {
                    return 'Please enter valid number.';
                }
            }
        });

        $('.editable-textarea').editable({
            type: 'textarea',
            showbuttons: 'bottom',
            validate: function (value) {
                if ($.trim(value) == '') {
                    return 'This field is required';
                }
            }
        });

        $('.editable-select-active').editable({
            // source: [
            //     {value: 1, text: 'Active'},
            //     {value: 0, text: 'Inactive'}
            // ],
            display: function (value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function (o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('.editable-select-permanent').editable({
            display: function (value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function (o) {
                        return o.value == value;
                    });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('.editable-note').editable({showbuttons: 'bottom'});
        $('.editing-pencil').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).parents('.editable-parent').find('.editable-note').editable('toggle');
        });

        /*

         $('.editable-select-url').editable();
         $('.editable-select-data').editable({
         prepend: "not selected",
         source: [
         {value: 1, text: 'Male'},
         {value: 2, text: 'Female'}
         ],
         display: function(value, sourceData) {
         var colors = {"": "gray", 1: "green", 2: "blue"},
         elem = $.grep(sourceData, function(o){return o.value == value;});

         if(elem.length) {
         $(this).text(elem[0].text).css("color", colors[value]);
         } else {
         $(this).empty();
         }
         }
         });

         $('.editable-datepicker').editable({showbuttons: 'bottom'});
         $('.editable-date-select').editable();

         $('.editable-checklist').editable({
         showbuttons: 'bottom',
         source: [
         {value: 1, text: 'banana'},
         {value: 2, text: 'peach'},
         {value: 3, text: 'apple'},
         {value: 4, text: 'watermelon'},
         {value: 5, text: 'orange'}
         ]
         }); //or from data-source

         $('.editable-select2-tags').editable({
         inputclass: 'input-large',
         select2: {
         tags: ['html', 'javascript', 'css', 'ajax'],
         tokenSeparators: [",", " "]
         }
         });

         var countries = [];
         $.each({"BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Bartelemey", "BM": "Bermuda", "BN": "Brunei Darussalam", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "O1": "Other Country", "LV": "Latvia", "RW": "Rwanda", "RS": "Serbia", "TL": "Timor-Leste", "RE": "Reunion", "LU": "Luxembourg", "TJ": "Tajikistan", "RO": "Romania", "PG": "Papua New Guinea", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "BZ": "Belize", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "TM": "Turkmenistan", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "RU": "Russian Federation", "EE": "Estonia", "EG": "Egypt", "TK": "Tokelau", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "EU": "Europe", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova, Republic of", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania, United Republic of", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "FX": "France, Metropolitan", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands (Malvinas)", "FM": "Micronesia, Federated States of", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "CI": "Cote d'Ivoire", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos (Keeling) Islands", "CA": "Canada", "CG": "Congo", "CF": "Central African Republic", "CD": "Congo, The Democratic Republic of the", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syrian Arab Republic", "KG": "Kyrgyzstan", "KE": "Kenya", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "Korea, Republic of", "SI": "Slovenia", "KP": "Korea, Democratic People's Republic of", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "Virgin Islands, British", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Lao People's Democratic Republic", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "A1": "Anonymous Proxy", "TO": "Tonga", "LT": "Lithuania", "A2": "Satellite Provider", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libyan Arab Jamahiriya", "VA": "Holy See (Vatican City State)", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "Virgin Islands, U.S.", "IS": "Iceland", "IR": "Iran, Islamic Republic of", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AN": "Netherlands Antilles", "AQ": "Antarctica", "AP": "Asia/Pacific Region", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"}, function(k, v) {
         countries.push({id: k, text: v});
         });
         $('.editable-select2').editable({
         source: countries,
         select2: {
         width: 200
         }
         });

         $('.editable-multi-text').editable({
         showbuttons: 'bottom',
         validate: function(value) {
         if(value.city == '') return 'city is required!';
         },
         display: function(value) {
         if(!value) {
         $(this).empty();
         return;
         }
         var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
         $(this).html(html);
         }
         });

         $('.editable-note').editable({showbuttons: 'bottom'});
         $('#pencil').click(function(e) {
         e.stopPropagation();
         e.preventDefault();
         $('.editable-note').editable('toggle');
         });

         */
    });
}

function uploads(type) {
    /*
     if (type == 'doc') {
     $(function () {
     $input = $(".legal-doc");
     $input.fileinput({
     maxFileSize: 24000,
     uploadUrl: baseUrl+"/user/upload-files", // server upload action
     uploadAsync: true,
     allowedFileExtensions: ['jpg', 'png', 'gif', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'pdf', 'txt', 'xlsx', 'jpeg', 'zip', '7z', 'rar'],
     maxFileCount: 1,
     showUpload: true,
     dropZoneEnabled: false,
     uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
     });

     // CATCH RESPONSE
     $input.on('fileuploaderror', function(event, data, previewId, index) {
     var form = data.form, files = data.files, extra = data.extra,
     response = data.response, reader = data.reader;
     console.log(data.response.upload_error);
     });

     $input.on('fileuploaded', function(event, data, previewId, index) {
     var form = data.form, files = data.files, extra = data.extra,
     response = data.response, reader = data.reader;

     $(this).parents('.legal-doc-parent').find('.legal-doc-val').val(response.filename);
     });

     $(document).on('click', '.fileinput-remove', function (e) {
     var $doc_val = $(this).parents('.legal-doc-parent').find('.legal-doc-val');
     var doc_val = $doc_val.val();
     $doc_val.val('');

     $.ajax({
     url: baseUrl+'/user/delete-upload-file',
     data: {img, doc_val},
     type: 'POST',
     async: false
     });
     });
     });
     }
     */
    if (type == 'profile') {
        $(function () {
            $input = $(".profile-picture-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/user/upload-profile-picture", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;

                profileCropper(response.filename, $input.data('src'));
            });
        });
    }
    else if (type == 'advertisement') {
        $(function () {
            $input = $(".advertisement-picture-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/advertisement/upload-advertisement-picture", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                $(this).parents('.image-parent').find('.image-val').val(response.filename);
                // $('#'+element).val(response.filename);
                // var $imgval = $(this).parents('.image-parent').find('.image-val');
                // var fx = [];
                // var files = $imgval.val();
                // if(files != '' && files != null) {
                //     var fx = $.parseJSON(files);
                // }
                // fx[fileCount++] = response.filename;
                // x = JSON.stringify(fx);
                // $imgval.val(x);
            });
        });
    }
    else if (type == 'portfolio') {
        var fileCount = 0;
        $(function () {
            $input = $(".featured-image");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/portfolio/upload-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                // console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                $('.cover').parents('.image-parent').find('.featured-image-wrapper').hide();
                $('.cover').parents('.image-parent').find('.image-display').attr('src', '');
                $('.cover').parents('.image-parent').find('.image-id').val(0);

                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                profileCropper(response.filename, $input.data('src'));
                var $imgval = $(this).parents('.image-parent1').find('.image-val');
                var files = $imgval.val();
                if (files != '' && files != null) {
                    var fx = $.parseJSON(files);
                }
                fx = response.id;
                $imgval.val(fx);
                $('.cover').parents('.image-parent1').find('.image-val').val(fx);
                // $(this).parents('.image-parent1').find('.image-val').val(response.filename);
            });
        });
    }
    else if (type == 'snap') {
        var fileCount = 0;
        $(function () {
            $input = $(".snap-image");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/portfolio/upload-snap-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                // console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                $('.cover').parents('.image-parent-snap').find('.snap-image-wrapper').hide();
                $('.cover').parents('.image-parent-snap').find('.snap-image-display').attr('src', '');
                $('.cover').parents('.image-parent-snap').find('.snap-image-id').val(0);

                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                profileCropper(response.filename, $input.data('src'));
                var $imgval = $(this).parents('.image-parent2').find('.image-snap-val');
                var files = $imgval.val();
                if (files != '' && files != null) {
                    var fx = $.parseJSON(files);
                }
                fx = response.id;
                $imgval.val(fx);
                $('.cover').parents('.image-parent2').find('.image-snap-val').val(fx);
                // $(this).parents('.image-parent2').find('.image-snap-val').val(response.filename);
            });
        });
    }
    else if (type == 'images') {
        var fileCount = 0;
        $(function () {
            $input = $(".image-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/portfolio/portfolio-upload-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 10,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                var $imgval = $(this).parents('.image-parent').find('.image-gal-val');
                var fx = [];
                var files = $imgval.val();
                if (files != '' && files != null) {
                    var fx = $.parseJSON(files);
                    fileCount = fx.length;
                }
                fx[fileCount++] = response.id;
                x = JSON.stringify(fx);
                $imgval.val(x);
            });
        });
    }
    else if (type == 'blogs') {
        var fileCount = 0;
        $(function () {
            $input = $(".image-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/blogs/upload-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                $('.cover').parents('.image-parent').find('.featured-image-wrapper').hide();
                $('.cover').parents('.image-parent').find('.image-display').attr('src', '');
                $('.cover').parents('.image-parent').find('.image-id').val(0);
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;

                $(this).parents('.image-parent').find('.image-val').val(response.filename);
            });
        });
    }
    else if (type == 'news') {
        var fileCount = 0;
        $(function () {
            $input = $(".image-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/news/upload-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                $('.cover').parents('.image-parent').find('.featured-image-wrapper').hide();
                $('.cover').parents('.image-parent').find('.image-display').attr('src', '');
                $('.cover').parents('.image-parent').find('.image-id').val(0);
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;

                $(this).parents('.image-parent').find('.image-val').val(response.filename);
            });
        });
    }
    else if (type == 'review') {
        var fileCount = 0;
        $(function () {
            $input = $(".image-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/review/upload-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 1,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                $('.cover').parents('.image-parent').find('.featured-image-wrapper').hide();
                $('.cover').parents('.image-parent').find('.image-display').attr('src', '');
                $('.cover').parents('.image-parent').find('.image-id').val(0);

                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                var $imgval = $(this).parents('.image-parent').find('.image-val');
                var files = $imgval.val();
                if (files != '' && files != null) {
                    var fx = $.parseJSON(files);
                }
                fx = response.id;
                $imgval.val(fx);
                $('.cover').parents('.image-parent').find('.image-val').val(fx);
                // $(this).parents('.image-parent').find('.image-val').val(response.filename);
            });
        });
    }
    else if (type == 'review-gallery') {
        var fileCount = 0;
        $(function () {
            $input = $(".image-gallery-upload");
            $input.fileinput({
                maxFileSize: 24000,
                uploadUrl: baseUrl + "/review/upload-gallery-files", // server upload action
                uploadAsync: true,
                allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
                maxFileCount: 10,
                showUpload: true,
                dropZoneEnabled: true,
                uploadExtraData: {'_csrf': $('meta[name=csrf-token]').prop('content')}
            });

            // CATCH RESPONSE
            $input.on('fileuploaderror', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                //console.log(data.response.upload_error);
            });

            $input.on('fileuploaded', function (event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                    response = data.response, reader = data.reader;
                var $imgval = $(this).parents('.image-parent-gallery').find('.image-gal-val');
                var fx = [];
                var files = $imgval.val();
                if (files != '' && files != null) {
                    var fx = $.parseJSON(files);
                    fileCount = fx.length;
                }
                fx[fileCount++] = response.id;
                x = JSON.stringify(fx);
                $imgval.val(x);
            });
        });
    }
}

function cropper() {

    $image = $(".cropper-image > img");

    $(document).on('click', '.crop-image', function (e) {
        var img = $(this).data('image');
        if (img == '') {
            return false;
        }

        $image.attr('src', $(this).data('src') + img);
        $('.modal-right-image-cropping').modal('show');

        setTimeout(function () {
            $image.cropper({
                aspectRatio: 1,
                modal: true,
                done: function (data) {
                    //console.log(data);
                }
            });
        }, 1000);
    });

    $(document).on('click', '.cancel-cropping', function (e) {
        $image.attr('src', '');
        $image.cropper('destroy');
    });

    $(document).on('click', '.done-cropping', function (e) {
        var upload_image_data = $image.cropper("getDataURL", "image/jpeg");
        var image_name = $('#image-name').val();
        $.ajax({
            url: baseUrl + '/media/crop',
            type: 'POST',
            data: {image_data: upload_image_data, image_name: image_name},
            success: function (response) {
                var data = $.parseJSON(response);
                if (data != 'false') {
                    typeAlertRedirect('Success', 'Image has successfully been cropped as desired.', 'success', '');
                }
                else {
                    typeAlert('Operation Failed', 'Oops! something went wrong. please try again.', 'warning');
                }
            }
        });
    });

    $(document).on('click', '.cropper-aspect-ratio', function (e) {
        $image.cropper('destroy');
        $image.cropper({
            aspectRatio: $(this).data('value'),
            modal: true,
            done: function (data) {
                //console.log(data);
            }
        });
    });
}

function profileCropper(img, src) {

    $image = $(".cropper-image > img");

    $image.attr('src', src + img);
    $('.modal-right-image-cropping').modal('show');

    setTimeout(function () {
        $image.cropper({
            aspectRatio: 1,
            modal: true,
            done: function (data) {
                //console.log(data);
            }
        });
    }, 1000);


    $(document).on('click', '.cancel-cropping', function (e) {
        $image.attr('src', '');
        $image.cropper('destroy');
        $.ajax({
            url: baseUrl + '/user/delete-profile-picture',
            type: 'POST',
            data: {img: img},
            success: function (response) {
                var data = $.parseJSON(response);
                if (data == 'false') {
                    typeAlert('Operation Failed', 'Oops! something went wrong. please try again.', 'warning');
                }
                else {
                    location.reload();
                }
            }
        });
    });

    $(document).on('click', '.done-cropping', function (e) {
        var upload_image_data = $image.cropper("getDataURL", "image/jpeg");
        var image_name = $('#image-name').val();
        $.ajax({
            url: baseUrl + '/user/crop',
            type: 'POST',
            data: {image_data: upload_image_data, image_name: img},
            success: function (response) {
                var data = $.parseJSON(response);
                if (data == 'false') {
                    typeAlert('Operation Failed', 'Oops! something went wrong. please try again.', 'warning');
                }
                else {
                    $('.profile-display').attr('src', src + data);
                    location.reload();
                }
            }
        });
    });
}

function removeFile() {
    $(document).on('click', '.delete-file', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.parents('.remove-parent').data('id');
        var field = $this.parents('.remove-parent').data('field');
        var img = $this.parents('.remove-parent').data('img');
        msgText = 'Do you want to delete this file?';
        successMsg = 'Your file has Successfully been deleted.';
        errorMsg = 'Sorry, Could not delete the file at this time. Please try again.';

        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Delete it.',
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: baseUrl + '/user/delete-file',
                data: {id: id, field: field, img: img},
                type: 'POST',
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data != false) {
                        typeAlert('Success', successMsg, 'success');
                        $this.parents('.remove-parent').remove();
                    }
                    else {
                        typeAlert('Error!', errorMsg, 'warning');
                    }
                }
            });
        });
    });
}

/***************************************************************************************************************************/

/*
 function reports() {
 $(document).on('change', '.sort-by', function (e) {
 e.preventDefault();
 var url = document.URL;
 var split_url = url.split("?");
 if ($(this).val() != 'all') {
 var go = split_url[0] + '?by=' + $(this).val();
 }
 else {
 var go = split_url[0];
 }
 window.location.href = go;
 });

 $(document).on('click', '.sort-by-go', function (e) {
 e.preventDefault();
 var url = document.URL;
 var split_url = url.split("?");
 var from = $(this).parent().find('.date-from').val();
 var to = $(this).parent().find('.date-to').val();
 if (from != '') {
 if (to != '') {
 var go = split_url[0] + '?from=' + from + '&to=' + to;
 }
 else {
 var go = split_url[0] + '?from=' + from;
 }
 }
 else if (to != '' && from == '')  {
 var go = split_url[0] + '?to=' + to;
 }
 else {
 var go = split_url[0];
 }
 window.location.href = go;
 });
 }
 */

function users() {
    $(document).on('submit', '.users, .change-password, .change-pin', function (e) {
        e.preventDefault();
        var form = $(this);
        if (form.valid()) {
            submitForm(form);
        }
    });

    $(document).on('click', '.change-status', function (e) {
        e.preventDefault();
        var $this = $(this);
        var id = $this.parents('tr').data('id');
        var role = $this.parents('tr').data('role');
        if ($this.parents('tr').find('.user-status').attr('id') == 10) {
            msgText = 'Do you want to deactive this ' + role + '?';
            successMsg = 'This ' + role + ' is deactive now.';
            errorMsg = 'Sorry, Could not deactive the ' + role + ' at this time. Please try again.';
            content = '<span class="label label-danger">Inactive</span>';
            new_val = 0;
        }
        else {
            msgText = 'Do you want to Active this ' + role + '?';
            successMsg = 'This ' + role + ' is active now.';
            errorMsg = 'Sorry, Could not Active the ' + role + ' at this time. Please try again.';
            content = '<span class="label label-success">Active</span>';
            new_val = 10;
        }

        swal({
            title: 'Are You Sure?',
            text: msgText,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(190, 92, 73)",
            confirmButtonText: 'Yes, Change it.',
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: baseUrl + '/user/change-status',
                data: {id: id},
                type: 'POST',
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data != false) {
                        typeAlert('Success', successMsg, 'success');
                        $this.parents('tr').find('.user-status').html(content);
                        $this.parents('tr').find('.user-status').attr('id', new_val);
                    }
                    else {
                        typeAlert('Error!', errorMsg, 'warning');
                    }
                }
            });
        });
    });

    $(document).on('click', '.delete-profile-picture', function (e) {
        var img = $(this).data('image');
        $.ajax({
            url: baseUrl + '/user/delete-profile-picture',
            type: 'POST',
            data: {img: img},
            success: function (response) {
                if (response.status != 'false') {
                    typeAlertRedirect('Success', 'Your profile picture has been deleted.', 'success', '');
                }
                else {
                    typeAlert('Operation Failed', 'Oops! something went wrong. please try again.', 'warning');
                }
            }
        });
    });
}

function submitForm(form) {
    var formData = $(form).serialize();

    $.ajax({
        url: $(form).attr('action'),
        data: formData,
        type: 'POST',
        async: false,
        success: function (response) {
            var data = $.parseJSON(response);
            if (data != false) {
                if ($(form).data('tablename') == 'blog') {
                    if ($(form).data('action') == 'add' || $(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/blogs');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'portfolio') {
                    if ($(form).data('action') == 'add' || $(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/portfolio');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'review') {
                    if ($(form).data('action') == 'add' || $(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/review');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'portfolio-type') {
                    if ($(form).data('action') == 'add') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/portfolio/type');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'news') {
                    if ($(form).data('action') == 'add' || $(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/news');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'testimonial') {
                    if ($(form).data('action') == 'add') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/testimonials/');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/testimonials/');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'settings') {
                    typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/settings');
                    return false;
                }
                else if ($(form).data('tablename') == 'slider') {
                    if ($(form).data('action') == 'add' || $(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/slider');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }

                if ($(form).data('tablename') == 'home-slider') {
                    if ($(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/home-slider');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'users') {
                    if ($(form).data('action') == 'create-admin') {
                        typeAlertRedirect('Success', 'You have successfully created new administrator.', 'success', baseUrl + '/user/administrators');
                        return false;
                    }
                    else if ($(form).data('action') == 'update-admin') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/user/administrators');
                        return false;
                    }
                    else if ($(form).data('action') == 'create-operator') {
                        typeAlertRedirect('Success', 'You have successfully created new operator.', 'success', baseUrl + '/user/operators');
                        return false;
                    }
                    else if ($(form).data('action') == 'update-operator') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/user/operators');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'administrator') {
                    if ($(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'You have successfully updated your profile.', 'success', baseUrl + '/admin/profile');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'operator') {
                    if ($(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'You have successfully updated your profile.', 'success', baseUrl + '/operator/profile');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'change-password') {
                    if (data.status == 'ss') {
                        var role = $(form).data('action') == 'admin-password' ? 'admin' : 'operator';
                        typeAlertRedirect('Success', 'You have successfully updated your password.', 'success', baseUrl + '/' + role + '/profile');
                        return false;
                    }
                    else if (data.status == 'mm') {
                        typeAlert('Error', 'Password Mismatch. Please try again.', 'warning');
                        return false;
                    }
                    else if (data.status == 'ff') {
                        typeAlert('Error', 'Failed to updated your password. Please try again.', 'warning');
                        return false;
                    }
                    else if (data.status == 'icp') {
                        typeAlert('Error', 'Old Password did not match. Please try again.', 'warning');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'seo') {
                    if ($(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/seo');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'faq') {
                    if ($(form).data('action') == 'edit') {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/faq');
                        return false;
                    } else {
                        typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', '');
                        return false;
                    }
                }
                else if ($(form).data('tablename') == 'page') {
                    typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/page');
                    return false;
                }
                else if ($(form).data('tablename') == 'section-config') {
                    typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/section/content-edit/' + data.slug);
                    return false;
                }
                else if ($(form).data('tablename') == 'section-content') {
                    typeAlertRedirect('Success', 'Data has been saved Successfully.', 'success', baseUrl + '/section');
                    return false;
                }
                else {
                    typeAlert('Success', 'Data has been saved Successfully.', 'success');
                    $(form)[0].reset();
                    return false;
                }
            }
            else {
                if ($(form).data('tablename') == '') {
                    typeAlert('Error!', 'Sorry, Could not update the data at this time. Please try again.', 'warning');
                    return false;
                }
                else {
                    typeAlert('Error!', 'Sorry, Could not save the data at this time. Please try again.', 'warning');
                    return false;
                }
            }
        }
    });
}
