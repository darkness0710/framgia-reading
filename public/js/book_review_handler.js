var review_in_book_index = function () {
    this.data = {}

    this.init = function (data) {
        this.bindRatingHandler();
        this.bindEventListener();
    }

    this.bindRatingHandler = function () {
        $("#review-modal").starRating({
            starSize: 40,
            disableAfterRate: false,
            callback: function(currentRating, $el){
            }
        });
        $(".my-rating").starRating({
            starSize: 20,
            disableAfterRate: false,
        });
        var rates = $("div[id^='rate_']");
        for (var i = 0; i < rates.length; i++) {
            $("#" + rates[i].attributes.id.value).starRating({
                starSize: 20,
            });

            $("#" + rates[i].attributes.id.value).starRating('setRating', rates[i].attributes.value.value);
        }

    }

    this.bindEventListener = function () {
        $("#btn-submit").click(function (event) {
            event.preventDefault();
            var cmt = $("#comment").val();
            $.trim(cmt);
            if ($("#review-modal").starRating('getRating') <= 0) {
                var notification = alertify.notify('Please rate first', 'error', 5, function() {
                });
            } else {
                if (cmt.length > 0) {
                    $.ajax({
                        method: "POST",
                        dataType: "json",
                        data: $("#form-review").serialize(),
                        url: "/book/review",
                        success:function(data){
                            var notification = alertify.notify(data.message, 'success', 5, function() {});
                            $("#modal-review").modal('hide');
                            target_id = $("#target_id").val();
                            $("#review_number_" + target_id).html(data.data.reviewNumber);
                            $('#rate_' + target_id).starRating('setRating', data.data.rate);
                        },
                        error: function (data) {
                            var notification = alertify.notify('Oop!!! Something happened...', 'error', 5, function() {});
                        }
                    });
                } else {
                    var notification = alertify.notify('Comment field is required!', 'error', 5, function() {
                    });
                }
            }
        });
    }
};
