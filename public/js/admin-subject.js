$(document).on('click', '#modal-edit', function(e) {
    var url = window.location.href.split('#')[0];
    var id = $(this.attributes.subject_id).val();

    $.ajax({
        type: "GET",
        url: url + '/' + id,
        success: function(data) {
            $('#edit_input_title').val(data.title);
            $('#imageSize2').attr('src', '' + data.cover);
            $('input[name="subject_id"]').val(data.id);
            $('#edit_input_description').val(data.description);
            $('#edit_input_trending').val(data.trending);
        },
        error: function(data) {
            //Error
        }
    });

    $('#upload-avatar').change(function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('imageSize2').src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }
    });
});

$(document).on('click', '#update_subject', function(e) {
    e.preventDefault();
    var id = parseInt($('input[name="subject_id"]').val());
    var url = window.location.href.split('#')[0];
    var file_data = $('#upload-avatar').prop('files')[0];
    var form_data = new FormData();
    var subject_title = $('#edit_input_title').val();
    var subject_description = $('#edit_input_description').val();
    var subject_trending = parseInt($('#edit_input_trending').val()) || 0;

    if (subject_title.length == 0 || subject_description.length == 0) {
        var notification = alertify.notify('Title or Description null!!!', 'error', 5, function() {});
        return false;
    }

    form_data.append('title', subject_title);
    form_data.append('description', subject_description);
    form_data.append('trending', subject_trending);
    form_data.append('file', file_data);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url + '/' + id,
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(php_script_response) {
            location.reload();
        }
    });
});

function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length - 1].toLowerCase();
    var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "gif"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        var notification = alertify.notify('Invalid format image', 'error', 5, function() {});
        $("#upload-avatar").val("");
    }

    var file_data_size = $('#upload-avatar').prop('files')[0].size;
    if (file_data_size > IMAGE_SIZE) {
        var notification = alertify.notify('Size > 5 MB! ', 'error', 5, function() {});
        $("#upload-avatar").val("");
    }
}
