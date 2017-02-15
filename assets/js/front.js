$(document ).ready(function() {

    $('.carousel').carousel({
        interval: 3000
    });




    $('').click(function() {
        var lien = $(this).find('img').attr('src');
        console.log('test  '+lien);
        $('#myModal img').attr('src', lien);
        $('#myModal').modal();
        $.ajax({
            url : lien+'C_participation/test',
            type : 'POST',
            data: {id:lien},
            success : function(data){
                //clearconsole();
                if (data){
                    var $page_data = $(data);

                    //$('#containerlist').html($page_data.find('div#listPhotos'));
                }

                //$('#contentPage').append(code_html);
                //var $page_data = $(data);
                //$('#containerOffre').html($page_data.find('div#bodyOffre'));
                //var $page_data = $(data);
                //$('#containerOffre').html($page_data.find('div#bodyOffre'));
            }
        });
    });

});