$(document).on('change', '#filterPlans', function(e) {
    var filterPlans = $('.filter-option').text();
    var id = $('#user_id').val();
    var url = '/user/' + id + '/dashboard/plans';
    $.ajax({
        method: 'GET',
        url: url,
        data: {
            'filterPlans': filterPlans
        },
        success: function(data) {
            $('#dataPlans').html(data.html);
        },
        error: function(data) {
            //Error
        }
    });
});
