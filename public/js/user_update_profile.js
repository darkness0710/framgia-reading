var update_profile = function () {

    this.user_id = null;

    this.init = function (user_id) {
        this.user_id = user_id;
        post_url = "/user/" + user_id +"/detail/update-profile";
        $("#btn_save").click(function(e) {
            e.preventDefault();
            var formData = new FormData($("#form_edit_profile")[0]);
            $('#upload-avatar').bind('change', function() {
                formData.append('avatar', document.getElementById("upload-avatar").files[0]);
            });
            $.ajax({   
                type: "POST",
                processData: false,
                data: formData,
                url: post_url,
                async: false,
                contentType: false,
                success:function(data){
                    alert('Update Success!');
                    location.reload();
                },
                error: function (data) {
                    alert('Update Fail!');
                    console.log(data);
                }
            });
        });
    }
}
