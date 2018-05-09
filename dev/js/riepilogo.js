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

    // Debug
    var data = { action:'send_film', 'message':textareacontent, 'id_list':jsonmessage }
    console.log(data);
    console.log(bb_ajax_handler)

    $.ajax({
        url: bb_ajax_handler.ajaxurl,
        data: { action:'send_film', 'message':textareacontent, 'id_list':jsonmessage },
        type: 'POST',
        success: function(data) {
            console.log(data);
            jsonmessage.replace('\n');
            var response = jQuery.parseJSON(data);

            if( response.status != 'ok' )
            {
                console.log('Request error! status: '+response.status+' message: '+response.message);
                return;
            }

            var modal = document.createElement('div');
            modal.className = 'modal';
            modal.setAttribute('id', 'rispostaAJAX');

            var modalDialog = document.createElement('div');
            modalDialog.className = 'modal-dialog';

            var modalContent = document.createElement('div');
            modalContent.className = 'modal-content';

            var modalHeader = document.createElement('div');
            modalHeader.className = 'modal-header';

            var modalBody = document.createElement('div');
            modalBody.className = 'modal-body';

            var modalFooter = document.createElement('div');
            modalFooter.className = 'modal-footer';

            var header  = '<h5 class="modal-title">Rassegna Inviata</h5>';
            header += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
            header += '<span aria-hidden="true">&times;</span>';
            header += '</button>';

            modalHeader.innerHTML = header;


            var bodyCont = '<p>La tua richiesta è stata inviata correttamente.<br>';
            bodyCont += 'Riceverai una Email di conferma all’indirizzo di posta elettronica che hai indicato.<br>';
            bodyCont += '<br>';
            bodyCont += 'Verrai contattato tramite Email dalla nostra redazione.<br>';
            bodyCont += '<br>';
            bodyCont += 'Grazie<br>';
            bodyCont += 'La redazione di LO<b>SPETTACOLO</b>DELLA<b>SICUREZZA</b>.it</p>';

            modalBody.innerHTML = bodyCont;

            modalFooter.innerHTML = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>';

            modalContent.appenChild(modalHeader);
            modalContent.appenChild(modalBody);
            modalContent.appendChild(modalFooter);
            modalDialog.appendChild(modalContent);
            modal.appendChild(modalDialog);

            document.body.appendChild(modal);

            // var popup = document.createElement('div');
            // popup.className = 'bb-popup';
            //
            // var cancel = document.createElement('div');
            // cancel.className = 'bb-popup-cancel';
            // cancel.innerHTML = 'Chiudi  <span id="bb-popup-cancel-ico">X</span>';
            // cancel.onclick = function (e) { popup.parentNode.removeChild(popup) };
            //
            // popup.appendChild(cancel);
            //
            // var message = document.createElement('span');
            // message.innerHTML = '<div class="bb-popup-text">'+response.message+'</div>';
            // popup.appendChild(message);
            //
            // document.body.appendChild(popup);
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error.message);
        },
    });
}
