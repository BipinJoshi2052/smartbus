$(document).ready(function () {
    $body = $('body');
    var slot_id = $('#slot-id');
    var slot_name = $('#slot-name');
    $body.on('click', '#clear-slot', function () {
        slot_id.val('0');
        slot_name.val('');
    });

    $body.on('click', '.edit-slot', function () {
        var $this = $(this);
        slot_id.val($this.parents('tr').data('slot-id'));
        slot_name.val($this.parents('tr').data('slot-name'));
        slot_name.focus();
    });

    $body.on('click', '.delete-slot', function () {
        var $this = $(this);
        var parent = $this.parents('tr');
        var id = parent.data('slot-id');
        var name = parent.data('slot-name');
        msgTitle = 'Delete Slot';
        msgText = 'Are you sure you want to delete slot : ' + name.toUpper;
        btnConfirmText = 'Delete';
        btnCancelText = 'Cancel';
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
                $.ajax({
                    url: baseUrl + "/inventory/delete-slot",
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data === 'true') {
                            parent.remove();
                            typeAlert('Success', 'Slot deleted.', 'success');
                        } else {
                            alert(data);
                            typeAlert('Error', 'Sorry, Slot in use.', 'error');
                        }
                    },
                    error: function () {
                        typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                    }
                });
            }else{
                swal.close();
            }
        });


    });
});