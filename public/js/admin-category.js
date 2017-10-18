$(document).on('click', '#admin-search-categories', function(e) {
    axios.get('/categories/admin-search', {
        params: {
            title: $('#nameSearch').val().trim()
        }
    })
    .then(function (response) {
        $('#ajax_table_categories').html(response.data.html);
    })
    .catch(function (error) {
        //Error
    });
});
