$(document).ready(function () {
    var $body = $('body');

    if ($body.find('.ckeditor').length > 0) {
        CKEDITOR.config.height = 272;
        CKEDITOR.editorConfig = function (config) {
            config.toolbarGroups = [
                {name: 'document', groups: ['mode', 'document', 'doctools']},
                {name: 'clipboard', groups: ['clipboard', 'undo']},
                {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                {name: 'forms', groups: ['forms']},
                '/',
                {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                {name: 'links', groups: ['links']},
                {name: 'insert', groups: ['insert']},
                '/',
                {name: 'styles', groups: ['styles']},
                {name: 'colors', groups: ['colors']},
                {name: 'tools', groups: ['tools']},
                {name: 'others', groups: ['others']},
                {name: 'about', groups: ['about']}
            ];

            config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,PasteText,PasteFromWord,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Outdent,Indent,Blockquote,CreateDiv,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Language,Link,Unlink,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,Format,TextColor,BGColor,ShowBlocks,About';
        };

    }
    if ($('.delete-album').length > 0) {
        $('body').on('click', '.delete-album', function () {
            var id = $(this).data('id');
            swal({
                    title: "Move to Trash ?",
                    text: "Are you sure, you want to move this album to trash.",
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
                        $.ajax({
                            url: baseUrl + "/inventory/delete-album",
                            type: 'post',
                            data: {
                                id: id
                            },
                            success: function (data) {
                                if (data === 'true') {
                                    typeAlert('Success', 'Album Deleted.', 'success');
                                    location.reload();
                                } else {
                                    typeAlert('Error', 'Sorry, Could not delete Album', 'error');
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
    if ($('.delete-album-permanent').length > 0) {
        $('body').on('click', '.delete-album', function () {
            var id = $(this).data('id');
            swal({
                    title: "Proceed with Delete ?",
                    text: "You will not be able to recover this album!",
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
                        $.ajax({
                            url: baseUrl + "/inventory/delete-album-permanent",
                            type: 'post',
                            data: {
                                id: id
                            },
                            success: function (data) {
                                if (data === 'true') {
                                    typeAlert('Success', 'Album Deleted.', 'success');
                                    location.reload();
                                } else {
                                    typeAlert('Error', 'Sorry, Could not delete Album', 'error');
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
    $(function () {
        if ($body.find('.inventory-form').length > 0) {
            $(function () {
                $('.file-upload [type=text]').click(function () {
                    var t = $(this);

                    var f = $(this).parent().find('[type=file]');
                    f.trigger('click');
                    t.val('');
                    if ($('#album-image-error').length > 0) {
                        $('#album-image-error').remove();
                    }

                });
                $('.file-upload [type=file]').on('change', function () {
                    var t = $(this).parent().find('[type=text]');
                    var f = $(this);
                    var k = f.val();
                    var i = f.parents('.card').find('img');
                    var e = k.split('.');
                    var ext = e[e.length - 1];
                    if (ext == 'jpeg' || ext == 'jpg' || ext == 'png' || ext == 'gif') {
                        var fi = k.split('\\');
                        t.val(fi[fi.length - 1]);
                        i.remove();
                    } else {
                        f.replaceWith(f.val('').clone(true));
                        sweetalert('Oops', 'Only .jpg, .jpeg, .png and .gif files are supported.', 'info');
                    }
                });
                $('.clear-upload').on('click', function () {
                    var $this = $(this);
                    var card = $this.parents('.card');
                    var parent = card.find('.file-upload');
                    if (card.find('img')[0]) {
                        var image = card.find('img')[0];
                        var id = $('#inventory-id').val();
                        var msgTitle = 'Delete Image';
                        var msgText = 'Are you sure you want to delete this image';
                        var btnConfirmText = 'Delete';
                        var btnCancelText = 'Cancel';
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
                                    url: baseUrl + "/inventory/update-image",
                                    type: 'post',
                                    data: {
                                        id: id
                                    },
                                    success: function (data) {
                                        if (data === 'true') {
                                            typeAlert('Success', 'Image Successfully Removed.', 'success');
                                            location.reload();
                                        } else {
                                            typeAlert('Error', 'Sorry, Could not delete file', 'error');
                                        }
                                    },
                                    error: function () {
                                        typeAlert('Error', 'Sorry, Server error. Please try again later ', 'error');
                                    }
                                });
                            } else {
                                swal.close();
                            }
                        });
                    } else {
                        location.reload();
                    }


                });
            });

            //  Auto Complete
            $(function () {
                $('#artist-autocomplete').autocomplete({
                    source: artists
                });
                $('#genre-autocomplete').autocomplete({
                    source: genres
                });
                $('#label-autocomplete').autocomplete({
                    source: labels
                });
            });
        }
    });
    $(function () {
        $('[data-plugin="select2"]').select2({tags: true});
    });
});