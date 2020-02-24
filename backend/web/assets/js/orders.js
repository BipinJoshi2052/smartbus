$(document).ready(function () {

    $('body').on('click', '.dispatch-order', function () {
        var id = $(this).data('dispatch');
        swal({
                title: "Dispatch Item ?",
                text: "Are you sure, you want to dispatch this order.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Dispatch",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: baseUrl + "/orders/dispatch",
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            if (data === 'true') {
                                typeAlert('Success', 'Item Dispatched.', 'success');
                                location.reload();
                            } else {
                                typeAlert('Error', 'Sorry, Could not dispatch order', 'error');
                            }
                        },
                        error: function () {
                            typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                        }
                    });
                }
            });
    });
    $('.dispatch-order').on('click', function () {
        var data = $(this).data('dispatch');

    });
});