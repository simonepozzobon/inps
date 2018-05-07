var jsonmessage = {};
var filmarray   = cineteca_inail_getFilmInRassegna(bb_ajax_handler.userid);

jsonmessage = JSON.stringify(filmarray);

$.ajax({
    url: bb_ajax_handler.ajaxurl,
    data: { action:'get_film', 'message':'titles', 'id_list':jsonmessage },
    type: 'POST',
    success: function(data) {
        jsonmessage.replace('\n');
        var ret = jQuery.parseJSON(data);
        if(ret.status == "ok"){
            $('#bb-rassegna-list-query-container').html(ret.message);
        }else{
            $('#bb-rassegna-list-query-container').html('<h3 class="bb-none-titles">'+ret.message+'</h3>');
        }
    },
    error: function (xhr, status, error) {
        console.log('Error: ' + error.message);
    },
});

function cineteca_inail_sendfilmdatatostaff(){

    var textareacontent = document.getElementById('bb-riepilogo-textarea').value;  

    var jsonmessage = {};
    var filmarray   = cineteca_inail_getFilmInRassegna(bb_ajax_handler.userid);

    jsonmessage = JSON.stringify(filmarray);

    $.ajax({
        url: bb_ajax_handler.ajaxurl,
        data: { action:'send_film', 'message':textareacontent, 'id_list':jsonmessage },
        type: 'POST',
        success: function(data) {
            jsonmessage.replace('\n');
            var response = jQuery.parseJSON(data);

            if( response.status != 'ok' )
            {
                console.log('Request error! status: '+response.status+' message: '+response.message);
                return;
            }
            
            var popup = document.createElement('div');
            popup.className = 'bb-popup';

            var cancel = document.createElement('div');
            cancel.className = 'bb-popup-cancel';
            cancel.innerHTML = 'Chiudi  <span id="bb-popup-cancel-ico">X</span>';
            cancel.onclick = function (e) { popup.parentNode.removeChild(popup) };
            
            popup.appendChild(cancel);

            var message = document.createElement('span');
            message.innerHTML = '<div class="bb-popup-text">'+response.message+'</div>';
            popup.appendChild(message);                                    

            document.body.appendChild(popup);
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error.message);
        },
    });
}