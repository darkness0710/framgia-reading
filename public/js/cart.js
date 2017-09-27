$(document).on('click', '#addBookToCart a', function(e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    $.ajax({
        url: addressValue,
        success: function (data) {
            var notification = alertify.notify('Add success book!', 'success', 5, function() {  
            
            });
            $('#cartAjax').html(data.html);
        },
        error: function (data) {
            console.log(data);
            var notification = alertify.notify(data.responseJSON.message, 'error', 5, function() {  
            
            });
            console.log(data);
        }
    });
});

$(document).on('click', '#removeBookToCart a', function(e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    $.ajax({
        url: addressValue,
        success: function (data) {
            var notification = alertify.notify('Remove success book!', 'success', 5, function() {  

            });
            $('#cartAjax').html(data.html);
        },
        error: function (data) {
            var notification = alertify.notify('Server is busy!!!', 'danger', 5, function() {  
            
            });
            console.log(data);
        }
    });
});
