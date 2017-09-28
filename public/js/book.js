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

$(document).on('click', '#searchBook', function(e) {
    axios.get('/book/search', {
        params: {
            subject: $( "#list-subject select option:selected" ).text().trim(),
            sort: $( "#list-sort select option:selected" ).text().trim(),
            title: $('#nameSearch').val().trim()
        }
    })
    .then(function (response) {
        $('.result').html(response.data.html);
    })
    .catch(function (error) {
        console.log(error);
    });
});
