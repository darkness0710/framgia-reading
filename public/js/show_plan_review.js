var show_plan_review = function () {
    this.data = {
        plan_rate: null,
    }

    this.init = function (data) {
        this.data.plan_rate = data.plan_rate;
        this.starRatingbinding();
        this.eventListenerBinding();
    }

    this.starRatingbinding = function () {
        console.log('oke');
        $("#review-modal").starRating({
            starSize: 40,
            disableAfterRate: false,
            callback: function(currentRating, $el){
            }
        });
        $(".my-rating").starRating({
            starSize: 20,
            disableAfterRate: false,
            callback: function(currentRating, $el){
                // make a server call here
            }
        });
        $("div[id*='rate_']").starRating('setRating', this.data.plan_rate);
        reviews = $("div[id^='review_']");

        for (var i = 0; i < reviews.length; i++) {
            $("#" + reviews[i].attributes.id.value).starRating({
                starSize: 20,
                readOnly: true,
            });

            $("#" + reviews[i].attributes.id.value).starRating('setReadOnly', true);
            $("#" + reviews[i].attributes.id.value).starRating('setRating', reviews[i].attributes.value.value);
        }
    }

    this.eventListenerBinding = function () {
        $("#btn-submit").click(function (event) {
            event.preventDefault();
            if ($("#review-modal").starRating('getRating') <= 0) {
                var notification = alertify.notify('Please rate first', 'error', 5, function() {
                });
            } else {
                var cmt = $("#comment").val();
                if (cmt.length > 0) {
                    var data = $("#form-review").serializeArray();
                    target_id = data.find(item => item.name === 'target_id').value;
                    plan_id = window.location.pathname.split( '/' )[2];
                    if (target_id != plan_id) {
                        data.find(item => item.name === 'target_id').value = plan_id;
                        $("#target_id").val(plan_id);
                    }

                    $.ajax({
                        method: "POST",
                        dataType: "json",
                        data: data,
                        url: "/plan/review",
                        success:function(data){
                            var notification = alertify.notify(data.message, 'success', 5, function() {});
                            var review = data.data.review;
                            var user = data.user;
                            var plan_id = $("#target_id").val();
                            $('#rate_' + plan_id).starRating('setRating', data.data.rate);
                            $("#modal-review").modal('hide');
                            $('#total_review_' + plan_id).html(data.data.reviewNumber);
                            if ($('#review_' + review.id).html() != null) {
                                $("#review_" + review.id).starRating('setRating', review.rate);
                                $("#review_content_" + review.id).html(review.content);
                            } else {
                                var template = "<li class='clearfix'><div class='row'><div class='col-xs-12 col-sm-4 col-md-3'>" +
                                "<div class='review-header'><h6>" + user.name + "</h6><span class='review-date'>" + review.created_at +
                                "</span><div class='rating-item'><div class='my-rating' id='" + ("review_" + review.id) + "' value='" + review.rate + "'></div></div>" +
                                "<a href='#' class='btn btn-primary'>REPLY</a></div></div><div class='col-xs-12 col-sm-8 col-md-9'>" +
                                "<div class='review-content' id='" + ('content_review_' + review.id) + "'><p>" + review.content + "</p></div>" +
                                "<a href='#' class='review-load-more'>Load More Comments</a></div></div></li>";

                                $("#list_review").append(template);
                                $("#review_" + review.id).starRating({
                                    starSize: 20,
                                    disableAfterRate: false,
                                    callback: function(currentRating, $el){
                                    }
                                });
                                $("#review_" + review.id).starRating('setRating', review.rate);
                            }
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


        $("#btn_review").click(function (event) {
            if ($("#user_login").val() != undefined) {
                $('#target_id').val(plan_id = window.location.pathname.split( '/' )[2]);
                $("#modal-review").modal('show');
            } else {
                var notification = alertify.notify('Please Login first!', 'error', 5, function() {});
            }
        });
    }
}
