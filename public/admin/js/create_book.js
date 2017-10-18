var create_book = function () {
    this.data = {
        user_id: null,
    }

    this.init = function (data) {
        this.data.user_id = data.user_id;
        this.bindEventListener();
        this.handleEdit();
    }

    this.bindEventListener = function () {
        user_id = this.data.user_id;
        this.uploadCover('upload-cover', 'cover');
        $("#year").datetimepicker();
        $("#btn_submit").click(function (event) {
            event.preventDefault();
            errors = $("strong[id^='error_book_']");
            $.each(errors, function (key, value) {
                $("#" + value.id).empty();
            });

            var formData = new FormData($("#create-user")[0]);
            $('#upload-cover').bind('change', function() {
                formData.append('cover', document.getElementById("upload-cover").files[0]);
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: formData,
                async: false,
                contentType: false,
                processData: false,
                url: '/user/' + user_id + '/admin/books/store',
                success:function(data){
                    $("#modal-new-subjects").modal('hide');
                    var notification = alertify.notify(data.messages, 'success', 5, function() {
                        location.reload();
                    });
                },
                error: function (data) {
                    var response = data.responseJSON;
                    $.each(response, function (key, value) {
                        err_id = "#error_book_" + key;
                        $(err_id).html(value[0]);
                    });
                    var notification = alertify.notify('Error!!!', 'error', 5, function() {});
                }
            });
        })

        btn_show = $("button[id^='btn_show_']");
        $.each(btn_show, function (key, value) {
            $("#" + value.id).click(function (event) {
                book_id = event.currentTarget.attributes.id.value.replace('btn_show_', '');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: '/user/' + user_id + '/admin/books/show/' + book_id,
                    success:function(data){
                        $("#container_show_detail").html(data.html);
                        $("#modal_show_detail").modal('show');
                    },
                    error: function (data) {
                        var notification = alertify.notify('Error!!!', 'error', 5, function() {});
                    }
                });
            });
        });
    }

    this.uploadCover = function (input_id, img_id) {
        $('#' + input_id).change(function(evt){
            var tgt = evt.target || window.event.srcElement, files = tgt.files;

            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById(img_id).src = fr.result;
                }

                fr.readAsDataURL(files[0]);
            }
        })

    }

    this.handleEdit = function () {
        this.uploadCover('upload_cover_edit', 'cover_updated');
        btn_edits = $("button[id^='btn_edit_']");
        $.each(btn_edits, function (key, value) {
            $("#" + value.id).click(function (event) {
                clear_input = $("input[id^='error_']");
                $.each(clear_input, function (clear_key, clear_value) {
                    $("#" + clear_value.id).val('');
                });

                book_id = event.currentTarget.attributes.id.value.replace('btn_edit_', '');
                $.ajax({
                    type: "GET",
                    url: '/user/' + user_id + '/admin/books/edit/' + book_id,
                    success:function(data){
                        book = data.book;
                        $("#modal-edit-book").modal('show');
                        $("#edit_book_id").val(book.id);
                        $("#cover_edit").attr('src', book.cover);
                        $("#edit_title").val(book.title);
                        $("#edit_description").val(book.description);
                        $("#edit_author").val(book.author);
                        $("#edit_category").val(book.category);
                        $("#edit_status").val(book.status);
                        $("#edit_publisher").val(book.publisher);
                        $("#edit_pages").val(book.pages);
                        $("#edit_language").val(book.speak);
                        $("#edit_year").val(book.year);
                        $("#edit_summary").val(book.summary);
                    },
                    error: function (data) {
                        var notification = alertify.notify('Error!!!', 'error', 5, function() {});
                    }
                });
            });
        });

        $("#btn_update").click(function (event) {
            var formData = new FormData($("#form-edit-book")[0]);
            $('#upload_cover_edit').bind('change', function() {
                formData.append('cover_updated', document.getElementById("upload_cover_edit").files[0]);
            });
            book_id = $("#edit_book_id").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: formData,
                async: false,
                contentType: false,
                processData: false,
                url: '/user/' + user_id + '/admin/books/update/' + book_id,
                success:function(data){
                    $("#modal_create_user").modal('hide');
                    var notification = alertify.notify(data.messages, 'success', 5, function() {
                        location.reload();
                    });
                },
                error: function (data) {
                    var response = data.responseJSON;
                    $.each(response, function (key, value) {
                        err_id = "#admin_error_" + key;
                        $(err_id).html(value[0]);
                    });
                }
            });
        });
    }
}
