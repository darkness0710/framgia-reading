window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).on('click', '#paginate ul li a', function(e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    axios.get(addressValue)
      .then(function (response) {
        $('.result').html(response.data.html);
      })
      .catch(function (error) {
       
      });
});

$(document).on('click', '#search-subjects', function(e) {
    axios.get('/subject/search', {
        params: {
            sort: $( "#list-sort select option:selected" ).text().trim(),
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
