window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).on('click', '#paginate ul li a', function (e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    axios.get(addressValue)
      .then(function (response) {
        $('#ajax_table_subjects').html(response.data.html);
      })
      .catch(function (error) {

      });
});
