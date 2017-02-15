/**
 * Created by abdel-latifmabrouck on 03/01/2017.
 */
$(document ).ready(function() {

    function clearconsole() {
        console.log(window.console);
        if(window.console || window.console.firebug) {
            //console.clear();
        }
    }

    console.log("Front ready!");
    $('body').on('click','#id_albums', function(e) {
        e.preventDefault(); // J'empêche le comportement
        var id_album = $(this).find("a").attr('href');

        console.log(id_album);
        $.ajax({
            url : lien+'C_participation',
            type : 'POST',
            data: {id:id_album},
            success : function(data){
                //clearconsole();
                if (data){
                    var $page_data = $(data);
                    $('#containerlist').html($page_data.find('div#listPhotos'));
                }

                //$('#contentPage').append(code_html);
                //var $page_data = $(data);
                //$('#containerOffre').html($page_data.find('div#bodyOffre'));
                //var $page_data = $(data);
                //$('#containerOffre').html($page_data.find('div#bodyOffre'));
            }
        });
    });


    $("#uploadimage").on('submit',(function(e) {
        e.preventDefault();
        var url = lien+'C_participation/upload_file';
        var arrInputs = $("[name='file']").val();
        console.log(arrInputs);
        $.ajax({
            url: url, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                //location.reload();
            }
        });
    }));


    //bouton pour participation
    $('#bt_participer').click(function () {
        var link = $('#myModal img').attr('src');
        var url = lien+'C_participation/participer';
        console.log(link);
        $.ajax({
            url: url, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: {link:link}, // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                console.log(data);
            }
        });
    });

    $('body').on('submit','#uploadPhoto', function(e) {
        e.preventDefault();

        var url = lien+'participation/upload_file';
        var linkImage = document.getElementById('file').files[0];
        console.log(url);
        $.ajax({
            url: url,
            type : 'POST',
            dataType : 'json',
            data: {lien:linkImage},
            success: function (res) {
                console.log(res);
            },
            error: function (error) {
                console.log(error);
            }
        }); // End: $.ajax()

    });
});
function view() {
    //onclick = alert("coucou");
    var p = document.getElementById("foo");
    // NOTE: showAlert(); ou showAlert(param); NE fonctionne PAS ici.
    // Il faut fournir une valeur de type function (nom de fonction déclaré ailleurs ou declaration en ligne de fonction).
    p.onclick = showAlert;
}
function showPhoto(link)
{
    //alert("Evènement de click détecté");
    //var url = document.images[0];
    $('#myModal img').attr('src', link);
    $('#myModal').modal();
    //console.log(link);
    $.ajax({
        url : lien+'C_participation/verifDateContest',
        type : 'POST',
        dataType: 'json',
        //data: {id:lien},
        success: function (data) {
            //var re = jQuery.parseJSON(data);
            $.each(data, function(index, element) {
                if (element.status == 0){
                    alert('pas de concours');
                    $('#msg-error-participation').html('<span style="color: #990000;">Pas de concours disponible pour pouvoir participer!!!</span>');
                    $('#bt_participer').remove();
                }else if(element.statusPart == 1){
                    alert('deja participer');
                    $('#msg-error-participation').html('<span style="color: #990000;">Vous ne pouvez participer qu\'a un seul concours à la fois!!!</span>');
                    $('#bt_participer').remove();
                }else{
                    alert('concours');
                    $('#msg-error-participation').html('<span></span>');
                    $('.modal-footer').html('<button type="button" class="btn btn-default" onClick="" id="bt_participer" data-dismiss="modal">Participer</button>' +
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#bt_participer').attr('onClick', "participate('"+link+"','"+element.id_contest+"')");
                }
            });
            //console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function participate(link, id) {
    console.log(link);
    console.log(id);
    $.ajax({
        url : lien+'C_participation/participate',
        type : 'POST',
        dataType: 'json',
        data: {link:link, id:id},
        success: function (data) {

        },
        error: function (error) {
            console.log(error);
        }
    });
}

function vote(idUser, idParticipate) {
    console.log(idUser);
    console.log(idParticipate);
    $.ajax({
        url : lien+'C_contest',
        type : 'POST',
        dataType: 'json',
        data: {idUser:idUser, idParticipate:idParticipate},
        success: function (data) {
            if (data){
                var $page_data = $(data);
                $('#contentVote').html($page_data.find('div#listVote'));
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}



