window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).on('click', '#paginate ul li a', function(e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    axios.get(addressValue)
        .then(function (response) {
          $('.result').html(response.data.html);
        })
        .catch(function (error) {
            //Error
        });
});

$(document).on('click', '#searchUser', function(e) {
    axios.get('/user/search', {
        params: {
            sort: $( "#list-sort select option:selected" ).text().trim(),
            typeSort: $( "#type-sort select option:selected" ).text().trim(),
            title: $('#nameSearch').val().trim()
        }
    })
    .then(function (response) {
        $('.result').html(response.data.html);
    })
    .catch(function (error) {
        //Error
    });
});
