$(document).ready(function(e) {
    $('#search-result').hide();

    $(document).on('keyup', '#search', function() {
        var ajaxSearch = function() {
            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    'keyword': keyword
                },
                success: function(data) {
                    if (data.html) {
                        $('#search-result').show();
                        $('#search-result').html(data.html);
                    } else {
                        $('#search-result').show();
                        $('#search-result').html('No results found! Please try other keywords. Good luck!');
                    }
                },
            });
        }

        var url = '/search';
        var keyword = $(this).val().trim();
        var timer;

        if (keyword.length > 0) {
            if (timer) {
                clearTimeout(timer);
                timer = setTimeout(function() {
                    ajaxSearch();
                }, 1000);
            } else {
                timer = setTimeout(function() {
                    ajaxSearch();
                }, 1000);
            }
        }
    });

    $(window).click(function() {
        $('#search-result').hide();
    });
});
