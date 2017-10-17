$("#review-modal").starRating({
    starSize: 40,
    disableAfterRate: false,
    callback: function(currentRating, $el){
    }
});

$("#btn-submit").click(function (event) {
    event.preventDefault();
    if ($("#review-modal").starRating('getRating') <= 0) {
        var notification = alertify.notify('Please rate first', 'error', 5, function() {});
    } else {
        var cmt = $("#comment").val();
        if (cmt.length > 0) {
            $.ajax({
                method: "POST",
                dataType: "json",
                data: $("#form-review").serialize(),
                url: "/plan/review",
                success:function(data){
                    plan_id = $("#target_id").val();
                    $('#rate_' + plan_id).starRating('setRating', data.data.rate);
                    $("#modal-review").modal('hide');
                    document.getElementById('total_review_' + plan_id).innerHTML = data.data.reviewNumber;
                    var notification = alertify.notify(data.message, 'success', 5, function() {
                    });
                },
                error: function (data) {
                    var notification = alertify.notify('Oop!!! Something happened...', 'error', 5, function() {
                    });
                }
            });
        } else {
            var notification = alertify.notify('Comment is required!', 'error', 5, function() {});
        }
    }
});

$(".my-rating").starRating({
    starSize: 20,
    disableAfterRate: false,
    callback: function(currentRating, $el){
        // make a server call here
    }
});

var arr = $("div[id*='rate_']");
for (var i = 0; i < arr.length; i++) {
    $("#" + arr[i].attributes.id.value).starRating('setRating', arr[i].attributes.value.value);
}
