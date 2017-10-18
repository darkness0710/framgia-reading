$(document).on('click', '#admin-search-books', function(e) {
    axios.get('/book/admin-search', {
        params: {
            title: $('#nameSearch').val().trim()
        }
    })
    .then(function (response) {
        $('#ajax_table_books').html(response.data.html);
    })
    .catch(function (error) {
        //Error
    });
});
