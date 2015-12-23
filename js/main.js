$(document).ready(function () {
    var names = get('worker');
    $("#plan .id_worker").hover(function (eventObject) {
        var id = $(this).text();
        var text;
        for(var i =0;i<names.length;i++)
        {
            if(names[i]['id_worker']==id)
            {
                text = names[i]['name']+" "+names[i]['second_name'];
            }
        }
        $(this).append('<p id="promt">'+text+'</p>').css({"top": eventObject.pageY , "left": eventObject.pageX - 5});

    }).mouseout(function () {
        $(this).find('#promt').remove();
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
