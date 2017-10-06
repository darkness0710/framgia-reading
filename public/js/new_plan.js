var module_create_plan = (function () {
    try {
        book_cart = JSON.parse($("#cart").val());
    }
    catch(err) {
        console.log(err);
    }

    var cartItems = [];
    var num = 0;
    var cart = [];
    var items = [];
    var current_element_id = '';
    if (book_cart != null && book_cart != undefined) {
        cartItems = book_cart.items;
        console.log(cartItems);
        $.each(cartItems, function (key, value) {
            var item = [];
            item.id = key;
            item.title = value.item.title;
            item.cover = value.item.cover;
            cart.push(item);
        });
    }

    var item_num_template = "<div class='col-xss-12 col-xs-2 col-sm-2 col-md-1'><div class='day'><h6 class='text-uppercase mb-0 mt-5 text-muted w150p' >Item {item_num}</h6></div></div>";
    var suggestion_template = "<ul><div><div id='{suggest_container_id}'>{suggestion_container_mark}</div></div></ul>";
    var suggest_item_template = "<a><li id='{book_id}' class='m-10'><img class='thumb inline' src='{book_cover}'><span class='suggest-item'>{book_title}</span></li></a>";
    var book_name_template = "<div class='form-group col-md-12'><label>Book Name</label><div><div class='col-md-11 mr-10 float-left no-padding'><input type='text' id='{bname_id}' name='{bname_id}' required class='form-control mb-10'></div><div><i class='fa fa-times mr-10' aria-hidden='true' id='{clear_book_chose}'></i><a data-toggle='modal' data-target='#searchModal'><i class='fa fa-search' aria-hidden='true' id='{btn_search_book}'></i></a></div></div>{suggest_container}</div><div class='clearfix'></div>"
    var duration_template = "<div class='form-group col-md-11'><label>Duration</label><input type='number' name='{duration_id}' required class='form-control' id='{duration_id}'></div><div class='clearfix'></div>"
    var note_template = "<div class='form-group col-md-11'><label>Note</label><textarea class='form-control' required rows='5' id='{note_id}' name='{note_id}'></textarea></div>";
    var html_template="<div class='itinerary-form-wrapper' id='{item}'><div><div><div class='itinerary-form-item'><div class='content clearfix'><div class='col-xss-12 col-xs-2 col-sm-2 col-md-1'><div class='day'><h6 class='text-uppercase mb-0 mt-5 text-muted w200p'>Item {item_num}</h6></div></div><a id='{btn_delete}' class='pull-right'><span class='pull-right btn btn-delete' data-toggle='tooltip' title='Remove'><i class='fa fa-times mt-100' aria-hidden='true'></i></span></a><div class='clearfix'></div><div class='row gap-20'><div class='col-md-11'><div class='row gap-20'><div class='col-sm-12'>{input_container}</div></div></div></div></div></div></div></div>";

    /*
    **    mark_id to replace in html template below
    **
    **    '{suggest_container_id}',
    **    '{item_num}',
    **    '{book_cover}',
    **    '{book_title}',
    **    '{suggest_container}',
    **    '{duration_id}',
    **    '{note_id}',
    **    '{input_container}',
    **    '{btn_delete}',
    **    '{bname_id}',
    **    '{book_id}',
    **    '{clear_book_chose}',
    **    '{btn_search_book}'
    **
    */

    this.init = function () {
        this.toggleSubmitBtn;
        $("#btn_add").click(function (event) {
            num++;
            var new_item = html_template;
            var item_num = item_num_template;
            item_num = item_num.replace('{item_num}', num + 1);
            item_number = num;
            this.toggleSubmitBtn;

            suggestion = suggestion_template.replace('{suggest_container_id}', 'suggestion_' + item_number);
            suggestion_html = '';
            for (var i = 0; i < cart.length; i++) {
                suggestion_item = suggest_item_template.replace('{book_cover}', cart[i].cover);
                suggestion_item = suggestion_item.replace('{book_title}', cart[i].title);
                suggestion_item = suggestion_item.replace('{book_id}', cart[i].id);
                suggestion_html += suggestion_item;
            }

            suggestion = suggestion.replace('{suggestion_container_mark}', suggestion_html);

            var book_name = book_name_template.replace('{suggest_container}', suggestion);
            book_name = book_name.replace('{clear_book_chose}', 'clear_book_chose_' + item_number);
            book_name = book_name.replace('{btn_search_book}', 'btn_search_book_' + item_number);
            var duration = duration_template.replace('{duration_id}', 'duration_' + num);
            duration = duration.replace('{duration_id}', 'duration_' + num);
            var note = note_template.replace('{note_id}', 'note_' + num);
            note = note.replace('{note_id}', 'note_' + num)
            html = html_template.replace('{input_container}', book_name + duration + note);
            html = html.replace('{btn_delete}', 'btn_delete_' + num);
            html = html.replace('{item}', 'item_' + num);
            html = html.replace('{item_num}', num);
            html = html.replace('{bname_id}', 'bname_' + num);
            html = html.replace('{bname_id}', 'bname_' + num);

            $("#plan_item_container").append(html);
            $("#suggestion_" + item_number).hide();

            $("#btn_delete_" + item_number).click(function (event) {
                $("#item_" + event.currentTarget.attributes.id.value.replace('btn_delete_', '')).remove();
                this.toggleSubmitBtn;
            });

            $("#bname_" + item_number)
                .focusout(function (event) {
                    input_id = event.currentTarget.attributes.id.value;
                    input_id = input_id.replace('bname_', '');
                    $("#suggestion_" + input_id).delay(200).fadeOut(300);
                })
                .focusin(function (event) {
                    input_id = event.currentTarget.attributes.id.value;
                    input_id = input_id.replace('bname_', '');
                    $("#suggestion_" + input_id).show();
                });

            $("#clear_book_chose_" + item_number).hide();

            $("#suggestion_" + item_number + " > a").click(function (event) {
                parent_id = (event.currentTarget.parentElement.attributes.id.value + '').replace('suggestion_', '');
                item_id = event.currentTarget.firstChild.attributes.id.value;
                item_title = event.currentTarget.childNodes[0].childNodes[1].innerText;
                $("#bname_" + parent_id).val(item_title);
                $("bname_" + parent_id).attr('disabled', true);
                $("#clear_book_chose_" + parent_id).show();

                $("#clear_book_chose_" + parent_id).click(function (event) {
                    $("#bname_" + parent_id).val('');
                    $("#bname_" + parent_id).attr('disabled', false);
                    $("#" + event.currentTarget.attributes.id.value).hide();
                });
            });

            $("#btn_search_book_" + item_number).click(function (event) {
                current_element_id = (event.currentTarget.attributes.id.value + "").replace('btn_search_book_', '');
                document.cookie = "current_element_id = " + current_element_id;
            })
        });

        $("form").submit(function( event ) {
            $("input[id*='bname_']").prop('disabled', false);
        });
    }

    this.toggleSubmitBtn = function () {
        if (num == 0) {
            $('#submit_create_plan').attr('disabled', true);
        } else {
            $('#submit_create_plan').attr('disabled', false);
        }
    }

});
