var create_user = function () {
    this.data = {
        user_id: '',
    }

    this.init = function (data) {
        this.data.user_id = data.user_id;
        this.bindEventListener();
    }

    this.bindEventListener = function () {
        $('#dob').datetimepicker();
        user_id = this.data.user_id;
        $("#btn_submit").click(function (event) {
            event.preventDefault();
            errors = $("strong[id^='admin_error_']");
            $.each(errors, function (key, value) {
                $("#" + value.id).empty();
            });

            var formData = new FormData($("#create-user")[0]);
            $('#upload-avatar').bind('change', function() {
                formData.append('avatar', document.getElementById("upload-avatar").files[0]);
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
                url: '/user/' + user_id + '/admin/users/store',
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
        })
    }
}
