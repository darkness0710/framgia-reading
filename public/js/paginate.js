$(document).on('click', '#paginate li a', function (e) {
    var addressValue = $(this).attr("href");
    e.preventDefault();
    axios.get(addressValue)
      .then(function (response) {
        $('.result').html(response.data.html);
      })
      .catch(function (error) {
       
      });
});
