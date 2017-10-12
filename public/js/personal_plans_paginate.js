axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#show-plans',

    data: {
        items: [],
        forkedPlans: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    mounted : function(){
        this.showInfor(this.pagination.current_page);
    },

    methods: {
        showInfor: function(page) {
            var id = $("#user_id").val();
            var url = '/user/' + id + '/dashboard/plans/?page=' + page;
            axios.get(url).then(response => {
                plans = response.data.data.data;
                this.$set(this, 'forkedPlans', plans);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        },
        creatorProfile: function (event) {
            var user_id = event.srcElement.attributes.id.value;
            var url = '/user/' + user_id;
            window.location.assign(url);
        },
        dateDiff: function (str1, str2) {
            var diff = Date.parse( str2 ) - Date.parse( str1 );
            var days = Math.floor(diff / 86400000);
            return isNaN( diff ) ? NaN : Math.abs(days);
        },
        planDetail: function (event) {
            var plan_id = event.srcElement.attributes.id.value;
            var user_id = $("#user_id").val();
            var url = '/user/' + user_id + "/" + plan_id;
            window.location.assign(url);
        }
    }
});
