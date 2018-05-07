var jsonmessage = {};
var filmarray   = cineteca_inail_getFilmInRassegna(bb_ajax_handler.userid);

jsonmessage = JSON.stringify(filmarray);

$.ajax({
    url: bb_ajax_handler.ajaxurl,
    data: { action:'get_film', 'message':'full', 'id_list':jsonmessage },
    type: 'POST',
    success: function(data) {
        jsonmessage.replace('\n');
        var ret = jQuery.parseJSON(data);
        if(ret.status == "ok"){
            $('#bb-rassegna-list-query-container').html(ret.message);
        }else{
            $('#bb-rassegna-title').html(ret.message);
        }
    },
    error: function (xhr, status, error) {
        console.log('Error: ' + error.message);
    },
});
