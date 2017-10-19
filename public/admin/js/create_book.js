var create_book = function () {
    this.data = {
        user_id: null,
    }

    this.init = function (data) {
        this.data.user_id = data.user_id;
        this.bindEventListener();
    }

    this.bindEventListener = function () {
        user_id = this.data.user_id;
        this.uploadCover();
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
                    console.log(data);
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
                        console.log(data.html);
                        $("#container_show_detail").html(data.html);
                        $("#modal_show_detail").modal('show');
                    },
                    error: function (data) {
                        console.log(data);
                        var notification = alertify.notify('Error!!!', 'error', 5, function() {});
                    }
                });
            });
        });
    }

    this.uploadCover = function () {
        $('#upload-cover').change(function(evt){
            var tgt = evt.target || window.event.srcElement, files = tgt.files;

            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById('cover').src = fr.result;
                }

                fr.readAsDataURL(files[0]);
            }
        })

    }
}
