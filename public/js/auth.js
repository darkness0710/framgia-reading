$("#submit_btn").click(function(e) {
    e.preventDefault();
    data = $("#register_form").serialize();
    $.ajax({   
        method: "POST",
        dataType: "json",
        data: data,
        url: "/register",
        success:function(data){
            $('#registerModal').modal('hide');
        },
        error: function (data) {
            errors = data['responseJSON'];
            $.each(errors, function(index, value) {
                error_str = '<strong class="alert-danger">'+ value + '</strong>';
                $('#error_' + index).append(error_str);
            });
        }
    });
});

$('#register_accept_checkbox').change(function () {
    if(!this.checked) {
        $('#submit_btn').attr("disabled", true);
    } else {
        $("#submit_btn").removeAttr("disabled");
    }
});

$("#btn_login").click(function(e) {
    e.preventDefault();
    data = $("#login_form").serialize();
    $.ajax({   
        method: "POST",
        dataType: "json",
        data: data,
        redirect_url: window.location.href,
        url: "/login",
        success:function(data){
            $('#loginModal').modal('hide');
            location.reload();
        },
        error: function (data) {
            errors = data['responseJSON'];
            $.each(errors, function(index, value) {
                error_str = '<strong class="alert-danger">'+ value + '</strong>';
                $('#login_error_' + index).html(error_str);
            });
        }
    });
});
