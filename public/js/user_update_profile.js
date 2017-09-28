var update_profile = function () {
    this.init = function (id) {
        post_url = "/user/" + id + "/dashboard/update-profile";
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
                }
            });
        });
    }
}
