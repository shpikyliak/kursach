$(document).ready(function () {
    $('.add').click(function(){
        $('.save').removeAttr('disabled').addClass('btn-success');
        var html = "<tr>" +
            "<td></td>"+
            "<td><input class='new' name='size' placeholder='Размер'></td>" +
            "<td><button class='btn btn-danger delete_row'>X</button></td>"+
            "</tr>";

        $('table').append(html);
        installTags();
        $('.delete_row').click(function(){
                $(this).parent().parent().remove();
                if (!$('input').is('.new')) {$('.save').attr('disabled','disabled').removeClass('btn-success');}
                return false;
            }
        )
    });

});


