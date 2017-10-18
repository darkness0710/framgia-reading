$(document).on('click', '#admin-search-users', function(e) {
    axios.get('/user/admin-search', {
        params: {
            title: $('#nameSearch').val().trim()
        }
    })
    .then(function (response) {
        $('#ajax_table_users').html(response.data.html);
    })
    .catch(function (error) {
        //Error
    });
});
