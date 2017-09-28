window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#boss',
    data: {
        sorts: [], 
        subjects: []
    },
    mounted: function() {
        axios.get('/subject/get-sort')
            .then(response => this.sorts = response.data);
        axios.get('subject/get-subject')
            .then(response => this.subjects = response.data);
    },
    methods: {
        search: function(event) {
            axios.get('/plan/search', {
                    params: {
                        subject: $( "#list-subject select option:selected" ).text().trim(),
                        sort: $( "#list-sort select option:selected" ).text().trim(),
                        title: $('#nameSearch').val().trim()
                    }
                })
                .then(function(response) {
                    $('.result').html(response.data.html);
                    $(document).on('click', '#ajax ul li a', function(e) {
                        var addressValue = $(this).attr("href");
                        e.preventDefault();
                        axios.get(addressValue)
                          .then(function (response) {
                            $('.result').html(response.data.html);
                          })
                          .catch(function (error) {
                           
                          });
                    });
                })
                .catch(function(error) {
                    
                });
        },
    }
});

