$(document).ready(function () {
    $('.add').click(function(){
        $('.save').removeAttr('disabled').addClass('btn-success');

        var html = "<tr>" +
             "<td></td>"+
            "<td><input class='new' name='name' placeholder='Имя'></td>" +
            "<td><input class='new' name='second_name' placeholder='Фамилия'></td>" +
             "<td><button class='btn btn-danger delete_row'>X</button></td>"+
            "</tr>"
        $('table').append(html);
        $('.delete_row').click(function(){
                $(this).parent().parent().remove();
                if (!$('input').is('.new')) {$('.save').attr('disabled','disabled').removeClass('btn-success');}
                return false;
            }
        )
    });

    $('.check_delete').change(function(){
        if($('input:checkbox:checked'))
        {
            $('.delete').removeAttr('disabled').addClass('btn-success');
        }else{
            $('.delete').attr('disabled','disabled').removeClass('btn-success')
        }

    })


});
