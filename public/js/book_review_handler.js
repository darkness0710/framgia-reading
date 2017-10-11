$("#review-modal").starRating({
    starSize: 40,
    disableAfterRate: false,
    callback: function(currentRating, $el){
    }
});

$("#btn-submit").click(function (event) {
    event.preventDefault();
    if ($("#review-modal").starRating('getRating') <= 0) {
        var notification = alertify.notify('Please rate first', 'error', 5, function() {
        });
    } else {
        $.ajax({
            method: "POST",
            dataType: "json",
            data: $("#form-review").serialize(),
            url: "/book/review",
            success:function(data){
                $("#modal-review").modal('hide');
                target_id = $("#target_id").val();
                document.getElementById('total_review').innerHTML = data.data.reviewNumber;
                $('#rate_' + target_id).starRating('setRating', data.data.rate);
                var notification = alertify.notify(data.message, 'success', 5, function() {
                });
            },
            error: function (data) {
                var notification = alertify.notify('Oop!!! Something happened...', 'error', 5, function() {
                });
            }
        });
    }
});
