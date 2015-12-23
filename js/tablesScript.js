$(document).ready(function () {
    var table = $('table').attr('id');
    $('.check_delete').change(function(){
        if($('input:checkbox:checked'))
        {
            $('.delete').removeAttr('disabled').addClass('btn-success');
        }else{
            $('.delete').attr('disabled','disabled').removeClass('btn-success')
        }

    });
    $('.save').click(function(){
        var success = true;
        var data = {};
        var inp = $('.new').parent().parent();
        $.each(inp,function(key,tr){
            data[key]={};
           var field = $(tr).find('.new');
            $.each(field,function(a,input){
                $(input).removeClass('error');
                if ($(input).val()==''){
                    $(input).addClass('error');
                    success = false;
                }else{
                    var attr = $(input).attr('name');
                    data[key][attr] = $(input).val();
                }
            })
        });
        if(success){

            $.ajax({
                url:table+'/add',
                data:{'data':data} ,
                type:'POST',
               // dataType:'json',
                success:function(responce){
                    //if(responce['error']) error(responce);
                    //else location.reload()
                    console.log(responce);
                }
            })


        }

    });
    $('.delete').click(function(){
        var arr=new Array();
        var toDelete = $('input:checkbox:checked');

        $.each(toDelete,function(key,value)
        {
            var val=$(value).val();
            arr.push(val);
        })
        $.ajax({
            url :table+'/delete',
            type:'POST',
            data:{data:arr},
            success:function(responce)
            {
                if(responce['error']) error(responce);
                else location.reload();
            }
        });

    })
});

function error(data)
{
    var html = '<p class="error_message">'+data.error+'</p>';
    $('.control').append(html);

}

function getTagsNames(data)
{
    var tags = [];
    for(var i=0;i<data.length;i++){
        tags[i] = {value:data[i]['id_worker'],label:data[i]['name']+' '+data[i]['second_name']};
    }
    return tags;
}

function getTagsSize(data)
{
    var tags = [];
    for(var i=0;i<data.length;i++){
        tags[i] = {value:data[i]['id_size'],label:data[i]['size']};
    }
    return tags;
}
function getTagsStyle(data)
{
    var tags = [];
    for(var i=0;i<data.length;i++){
        tags[i] = {value:data[i]['id_style'],label:data[i]['style']};
    }
    return tags;
}