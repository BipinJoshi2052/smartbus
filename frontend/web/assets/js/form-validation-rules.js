$.validator.addMethod("required", $.validator.methods.required, "Mandatory fields must be filled.");
$.validator.addMethod("select", $.validator.methods.required, "Please select a value");
$.validator.addMethod("email", $.validator.methods.email, "Please enter proper email");
$.validator.addMethod("url", $.validator.methods.url, "Please enter proper URL");
$.validator.addMethod("file", $.validator.methods.required, "Please select a file");

$.validator.addMethod("check_category", $.validator.methods.remote, "Category already exists. ");

$.validator.addClassRules({
    'required': {
        required: true,
    },
    'required-select': {
        select: true,
        //minlength: 2
    },
    'required-email': {
        required: true,
        email: true,
    },
    'email': {
        email: true
    },

    'required-url': {
        required: true,
        url: true
    },
    'required-file': {
        file: true
    },
    'url': {
        url: true
    },
    "min-length": {
        required: true,
        digits: true,
        minlength: 5,
        maxlength: 5
    },
    "password": {
        minlength: 4
    },
    "password_again": {
        minlength: 4,
        equalTo: "#password"
    },
    "check_category": {
        check_category: baseUrl + '/directory/check-category'
    }
});

// combine them both, including the parameter for minlength
//$.validator.addClassRules("required", { cRequired: true, cMinlength: 2 });
$(document).ready(function () {
    $('form').validate();

    $('button[type=submit]').click(function (e) {
        e.preventDefault();

        var form = $(this).parents('form');
        var validator =  form.validate();

        if (form.valid()) {
            form.submit();
        } else {
            validator.focusInvalid();
        }
    });

});