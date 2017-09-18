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
            console.log(errors);
            $.each(errors, function(index, value) {
                console.log(index + "   " + value);
                $('#error_' + index).append('<strong class="alert-danger">'+ value + '</strong>');
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
        url: "/login",
        success:function(data){
            $('#loginModal').modal('hide');
        },
        error: function (data) {
            errors = data['responseJSON'];
            console.log(errors);
            $.each(errors, function(index, value) {
                console.log(index + "   " + value);
                $('#error_' + index).append('<strong class="alert-danger">'+ value + '</strong>');
            });
        }
    });
});
