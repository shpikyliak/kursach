$(document).ready(function () {
    var table = $('table').attr('id');
    $('.check_delete').change(function () {
        if ($('input:checkbox:checked')) {
            $('.delete').removeAttr('disabled').addClass('btn-success');
        } else {
            $('.delete').attr('disabled', 'disabled').removeClass('btn-success')
        }

    });
    $('.save').click(function () {
        var success = true;
        var data = {};
        var inp = $('.new').parent().parent();
        $.each(inp, function (key, tr) {
            data[key] = {};
            var field = $(tr).find('.new');
            $.each(field, function (a, input) {
                $(input).removeClass('error');
                if ($(input).val() == '') {
                    $(input).addClass('error');
                    success = false;
                } else {
                    var attr = $(input).attr('name');
                    data[key][attr] = $(input).val();
                }
            })
        });
        if (success) {
            $.ajax({
                url: table + '/add',
                data: {'data': data},
                type: 'POST',
                dataType: 'json',
                success: function (responce) {
                   if (responce['error']) error(responce);
                   else location.reload()
                    //console.log(responce);

                }
            })


        }

    });
    $('.delete').click(function () {
        var arr = new Array();
        var toDelete = $('input:checkbox:checked');
        $.each(toDelete, function (key, value) {
            console.log(value);
            var val = $(value).val();
            arr.push(val);
        })
        $.ajax({
            url: table + '/delete',
            type: 'POST',
            data: {data: arr},
            typeData:'json',
            success: function (responce) {
               if (responce['error']) error(responce);
                else location.reload();
            }
        });

    });
    $("td").dblclick(function () {
        if ($(this).index() != 0) {
            var name = $(this).attr('class').split(' ');
            var text = $(this).text();
            $(this).text('');
            $(this).append('<input class="modified" name="' + name[0] + '" value="' + text + '">');
            installTags();
            $(this).find('input').focus();
            $(this).find('input').focusout(function () {
                var newtext = $(this).val();
                $(this).parent().text(newtext).addClass('modified_field');
                $(this).remove();
                if (newtext != text) {
                    $('.save_modified').removeAttr('disabled').addClass('btn-success');
                }

            });
        }
    });
    $(".save_modified").click(function () {
        var data = {};
        var modified = $('.modified_field');
        $.each(modified, function (key, value) {

            var id = $(value).parent().find("td:first").text();
            var inRow = $(value).parent().find('.modified_field');
            data[id] = {};

            $.each(inRow, function (key1, value1) {

                var text = $(value1).text();
                var clas = $(value1).attr('class').split(' ')[0];
                data[id][clas] = text;
            })
        });

        $.ajax({
            url: table + '/update',
            data: {'data': data},
            type: 'POST',
            dataType: 'json',
            success: function (responce) {
                if (responce['error']) error(responce);
                else location.reload();
                console.log(responce);

            }
        })

    });
});

function error(data) {
    $('.error_message').remove();
    var html = '<p class="error_message">' + data.error + '</p>';
    $('.control').append(html);

};
function getTagsNames(data) {
    var tags = [];
    for (var i = 0; i < data.length; i++) {
        tags[i] = {value: data[i]['id_worker'], label: data[i]['name'] + ' ' + data[i]['second_name']};
    }
    return tags;
};
function getTagsSize(data) {
    var tags = [];
    for (var i = 0; i < data.length; i++) {
        tags[i] = {value: data[i]['id_size'], label: data[i]['size']};
    }
    return tags;
};
function getTagsStyle(data) {
    var tags = [];
    for (var i = 0; i < data.length; i++) {
        tags[i] = {value: data[i]['id_style'], label: data[i]['style']};
    }
    return tags;
};
function getTagsPlan(data) {
    var tags = [];
    for (var i = 0; i < data.length; i++) {
        tags[i] = {value: data[i]['id_plan'], label: data[i]['id_plan']};
    }
    return tags;
};
function getTagsDefect(data) {
    console.log(data);
    var tags = [];
    for (var i = 0; i < data.length; i++) {
        tags[i] = {value: data[i]['id_defect_type'], label: data[i]['defect_type']};
    }

    return tags;

};
function installTags() {
    var availableNames = getTagsNames(get('worker'));
    var availableSize = getTagsSize(get('size'));
    var availableStyle = getTagsStyle(get('style'));
    var availablePlan = getTagsPlan(get('plan'));
    var availableDefect = getTagsDefect(get('defect_type'));
    $("input[name='id_worker']").autocomplete({source: availableNames});
    $("input[name='size']").autocomplete({source: availableSize});
    $("input[name='style']").autocomplete({source: availableStyle});
    $("input[name='id_plan']").autocomplete({source: availablePlan});
    $("input[name='id_defect_type']").autocomplete({source: availableDefect});
};
function get(db) {
    var responce = false;
    $.ajax({
        url: 'main/get',
        data: 'table=' + db,
        dataType: "json",
        async: false,
        success: function (data) {
            responce = data;
        }

    });
    return responce;
};

