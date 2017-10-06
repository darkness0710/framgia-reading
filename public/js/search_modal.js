$(function() {
    $('#search-internal-book-link').click(function(e) {
        e.preventDefault();
        $("#internal-search-form").delay(100).fadeIn(100);
        $("#google-search-form").fadeOut(100);
        $('#search-google-book-link').removeClass('active');
        $(this).addClass('active');
    });
    $('#search-google-book-link').click(function(e) {
        e.preventDefault();
        $("#google-search-form").delay(100).fadeIn(100);
        $("#internal-search-form").fadeOut(100);
        $('#search-internal-book-link').removeClass('active');
        $(this).addClass('active');
    });
});

var typingTimer;
var doneTypingInterval = 1500;
var input = $('#internal-search-input');

input.on('keyup', function () {
  clearTimeout(typingTimer);
  $("#result").remove();
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

input.on('keydown', function () {
  clearTimeout(typingTimer);
});

function doneTyping () {
    text_search = input.val();
    if (text_search != '') {
        search(text_search);
    }
}

$("#interal-search").click(function (value) {
    doneTyping();
});

function search(data) {
    $.ajax({
        method: "POST",
        data: {
            title: data,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        },
        url: "/book/search-by-title",
        success:function(data) {
            $("#result").remove();
            template = "<ul class='mt-5 col-md-10 list-group internal-search-result' id='result'>"
            if (data.books.length > 0) {
                for (var i = 0; i < data.books.length; i++) {
                    item = "<li class='mt-20'><a id='book_" + (i + 1) + "'><img class='thumb inline float-left' src='" + data.books[i].cover +"'/><h3 class='ml-20'>" + data.books[i].title + "</h3></a></li><div class='clearfix'></div>";
                    template += item;
                }
                template += "</ul>";
                $("#book-search-result").append(template).fadeIn(200);
                for (var i = 0; i < data.books.length; i++) {
                    $("#book_" + (i + 1)).click(function (event) {
                        title = event.currentTarget.lastChild.innerText;
                        id = getCookie('current_element_id');
                        $("#bname_" + id).val(title);
                        $("#bname_" + id).attr('disabled', true);
                        $("#clear_book_chose_" + id).click(function (event) {
                            $("#bname_" + id).val('');
                            $("#bname_" + id).attr('disabled', false);
                            $("#" + event.currentTarget.attributes.id.value).hide();
                        });
                        $("#clear_book_chose_" + id).show();
                        $('#searchModal').modal('hide');
                    });
                }
            } else {
                template += "<h4>NO BOOK FOUND!</h4>";
                template += "</ul>";
            }

        },
        error: function (data) {
            template = "<ul class='mt-5 col-md-10 list-group internal-search-result' id='result'>"
            template += "<h4>Oops... An error has been occured! Please try again later!</h4>";
            template += "</ul>";
        }
    });
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/*
** Search GooGle Book Hanlder
*/

var ggTypingTimer;
var doneTypingGg = 1500;
var inputGoogle = $('#google-search');

inputGoogle.on('keyup', function () {
  clearTimeout(ggTypingTimer);
  $("#ggResult").remove();
  typingTimer = setTimeout(ggSearchDoneTyping, doneTypingGg);
});

inputGoogle.on('keydown', function () {
  clearTimeout(ggTypingTimer);
});

function ggSearchDoneTyping () {
    text_search = inputGoogle.val();
    if (text_search != '') {
        searchGgBook(text_search);
    }
}

$("#gg-search").click(function (value) {
    ggSearchDoneTyping();
});

function searchGgBook(inputData) {
    $.ajax({
        method: "POST",
        data: {
            title: inputData,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        },
        url: "/book/search-with-gg",
        success:function(responseData) {
            console.log(responseData);
        },
        error: function (responseData) {
            console.log(responseData);
        }
    });
}
