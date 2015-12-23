$(document).ready(function () {
    var availableNames = getTagsNames(get('worker'));
    var availableSize = getTagsSize(get('size'));
    var availableStyle = getTagsStyle(get('style'));
    $('.add').click(function(){
        $('.save').removeAttr('disabled').addClass('btn-success');
        var html = "<tr>" +
            "<td></td>"+
            "<td><input class='new' name='date' placeholder='date'></td>" +
            "<td><input class='new' name='amount_to_develop' placeholder='Количество'></td>" +
            "<td><input class='new' name='style' placeholder='Вид'></td>" +
            "<td><input class='new' name='size' placeholder='Размер'></td>" +
            "<td><input class='new' name='manufactured' placeholder='Изготовлено'></td>" +
            "<td><input class='new' name='id_worker' placeholder='Робочий'></td>" +
            "<td><button class='btn btn-danger delete_row'>X</button></td>"+
            "</tr>";

        $('table').append(html);
        $("input[name='id_worker']").autocomplete({source: availableNames});
        $("input[name='id_size']").autocomplete({source: availableSize});
        $("input[name='id_style']").autocomplete({source: availableStyle});
        $('.delete_row').click(function(){
                $(this).parent().parent().remove();
                if (!$('input').is('.new')) {$('.save').attr('disabled','disabled').removeClass('btn-success');}
                return false;
            }
        )
    });

});

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
}
