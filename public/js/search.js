$(document).ready(function(e) {
    $('#search-result').hide();

    $(document).on('keyup', '#search', function() {
        var url = '/search';
        var keyword = $(this).val();

        setTimeout(function() {
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
        }, 1000);

    });

    $(window).click(function() {
        $('#search-result').hide();
    });
});
