$.validator.addMethod("required", $.validator.methods.required, "Please enter a value");
$.validator.addMethod("select", $.validator.methods.required, "Please select a value");
$.validator.addMethod("email", $.validator.methods.email, "Please enter proper email");
$.validator.addMethod("url", $.validator.methods.url, "Please enter proper URL");
$.validator.addMethod("remote", $.validator.methods.remote, "Category already exists. ");
$.validator.setDefaults({
    ignore: [],
    // any other default options and/or rules
});
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
        remote: {
            url: baseUrl + "/directory/check-category",
            type: "post",
            data: {
                type: function () {
                    return $("#cat_type").val();
                },
                parent: function () {
                    return ($("#cat_parent").val()) ? $("#cat_parent").val() : 0;
                }
            }

        }
    }
});

// combine them both, including the parameter for minlength
//$.validator.addClassRules("required", { cRequired: true, cMinlength: 2 });
$(document).ready(function () {
    $('form').validate();

    $('button[type=submit]').click(function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
        var validator = form.validate();

        if (form.valid()) {
            form.submit();
        } else {
            validator.focusInvalid();
        }
    });

});