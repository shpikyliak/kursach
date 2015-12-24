$(document).ready(function () {
    $('.add').click(function(){
        $('.save').removeAttr('disabled').addClass('btn-success');
        var html = "<tr>" +
            "<td></td>"+
            "<td><input class='new' name='id_plan' placeholder='# Плана'></td>" +
            "<td><input class='new' name='id_defect_type' placeholder='# Вида брака'></td>" +
            "<td><input class='new' name='amount' placeholder='Количество'></td>" +
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


