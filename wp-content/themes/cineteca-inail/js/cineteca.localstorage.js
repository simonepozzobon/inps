function cineteca_inail_check_local_storage() {
	try {
		return 'localStorage' in window && window['localStorage'] !== null;
	} catch(e){
		return false;
	}
}
  
var ls_id = '_cineteca_inail_rassegna';

function cineteca_inail_addFilmToRassegna( id, userid ) {

	if( cineteca_inail_check_local_storage() )
	{
		try {

			var rassegna = [];

			if( window.localStorage.getItem( userid + ls_id ) != null )
				rassegna = cineteca_inail_getFilmInRassegna( userid );

			if( rassegna.indexOf(id) <= -1 )
			{
				if( rassegna.length >= 10 )
				{
					cineteca_inail_film_limit();
					return;
				}

				rassegna.push(id);
				cineteca_inail_film_added();
			}
			else
			{
				cineteca_inail_film_already_added();
			}

			window.localStorage.setItem(userid + ls_id,JSON.stringify(rassegna));

		} catch (e) {
		   return false;
		}

	}else{
		
		if( cineteca_inail_getCookie( userid + ls_id ) == null){
			cineteca_inail_createCookie( userid + ls_id ,id,3600, "/");
			cineteca_inail_film_added();
		}else{
			var myArr = cineteca_inail_getCookie( userid + ls_id );
			if(myArr.length == 10){
				cineteca_inail_film_limit();
				return false;
			}else{         
				myArr.push(id);
				myArr = myArr.filter( cineteca_inail_only_unique );
				cineteca_inail_deleteCookie(userid + ls_id );
				cineteca_inail_createCookie(userid + ls_id ,myArr,3600, "/");  
				cineteca_inail_film_added();      
			}
		} 
	}
	cineteca_inail_update_viewed_numbers(userid);
}

function cineteca_inail_getFilmInRassegna( userid ){
   
	var arrayresult = [];
 
	if( cineteca_inail_check_local_storage() )
	{ 
		try{

			return JSON.parse(window.localStorage.getItem( userid + ls_id ));

		}catch(e){
			return null;
		}  
	}else{

		var arrayresult = cineteca_inail_getCookie( userid + ls_id );

	}
	return arrayresult;
}

function cineteca_inail_removeFilmFromRassegna( id, userid ){

	var node = document.getElementById('bb-q-result-'+id);
	node.parentElement.removeChild(node);

	if( cineteca_inail_check_local_storage() )
	{
		var rassegna = cineteca_inail_getFilmInRassegna( userid );

		rassegna = rassegna.filter(function (val){
			return val != id;
		});

		localStorage.setItem(userid + ls_id,JSON.stringify(rassegna));

	}else{
		var arrayValues = cineteca_inail_getCookie( userid + ls_id );
		var values = [];

		if(arrayValues.length == 1){
			cineteca_inail_deleteCookie(userid + ls_id ,"/");    
		}else{
			for(var i=0;i<arrayValues.length;i++){
				if(arrayValues[i] != id)
					values.push(arrayValues[i]);
			}
			cineteca_inail_deleteCookie(userid + ls_id ,"/");
			cineteca_inail_createCookie(userid + ls_id ,values.join(','),3600, "/");
		}  
	}
	cineteca_inail_update_viewed_numbers(userid);
	return true;
}

function cineteca_inail_get_storage_count( userid ) {

	if( cineteca_inail_check_local_storage() )
	{
		var rassegna = cineteca_inail_getFilmInRassegna(userid);
		
		if( rassegna == null )
			return 0;

		return rassegna.length;
	}
	else
	{
		var mvalues = cineteca_inail_getCookie( userid + ls_id );
		if (mvalues == null){
			return 0
		}else{
			return mvalues.length;
		}
	}
}

function cineteca_inail_update_viewed_numbers( userid ) {
	var count = cineteca_inail_get_storage_count( userid );
	document.getElementById('bb-num-film-added').innerHTML  = count;
	document.getElementById('bb-num-film-remain').innerHTML = 10 - count;
}

function cineteca_inail_getCookie(name) {

	pCOOKIES = new Array();
	pCOOKIES = document.cookie.split('; ');
	for(bb = 0; bb < pCOOKIES.length; bb++){
		NmeVal  = new Array();
		NmeVal  = pCOOKIES[bb].split('=');
		if(NmeVal[0] == name){
			var sFilms =  decodeURI(NmeVal[1]);
			var arrayFilm = sFilms.split(",");
			return arrayFilm;
		}
	}
	return null;
}

function cineteca_inail_deleteCookie( name, path, domain ) {

	if (cineteca_inail_getCookie(name))
		cineteca_inail_createCookie(name, "", -2, path, domain);
}

function cineteca_inail_createCookie( name, value, expires, path, domain ) {
	var cookie = name + "=" + value + ";";

	if (expires) {
		if(expires instanceof Date) {
			if (isNaN(expires.getTime()))
				expires = new Date();
		}
		else
			expires = new Date(new Date().getTime() + parseInt(expires) * 1000 * 60 * 60 * 24);

		cookie += "expires=" + expires.toGMTString() + ";";
	}

	if (path)
		cookie += "path=" + path + ";";

	if (domain)
		cookie += "domain=" + domain + ";";

	document.cookie = cookie;
}

function cineteca_inail_transfer_rassegna( userid ) {
	
	var rassegna = [];
	var anonrass = [];
	var loggedrass = [];

	anonrass = cineteca_inail_getFilmInRassegna(0);
	
	if( anonrass.length == 0 )
		return;
	
	rassegna = anonrass;
	loggedrass = cineteca_inail_getFilmInRassegna(userid);

	if( loggedrass.length !=  0 )
		rassegna = loggedrass.concat(anonrass).unique().slice(0,10);

	if( cineteca_inail_check_local_storage() )
	{
		try
		{	
			window.localStorage.removeItem( '0' + ls_id );
			window.localStorage.setItem( userid + ls_id, JSON.stringify(rassegna) );

		}catch(e){
			return false;
		}
	}else
	{
		cineteca_inail_deleteCookie( userid+ls_id );
		cineteca_inail_createCookie( userid+ls_id,rassegna,3600, "/" );
	}
	cineteca_inail_update_viewed_numbers(userid);
	cineteca_inail_rassegna_transferred();
}

function cineteca_inail_only_unique(value, index, self) { 
	return self.indexOf(value) === index;
}

function cineteca_inail_film_limit(){
	alert("Hai raggiunto il limite di film. Non puoi inserirne più di 10 nella rassegna");
}

function cineteca_inail_film_added(){
	alert("Il film selezionato è stato aggiunto alla tua rassegna");
}

function cineteca_inail_film_already_added(){
	alert("Il film selezionato è già presente nella tua rassegna");
}

function cineteca_inail_rassegna_transferred(){
	alert("La rassegna creata precedentemente è stata trasferita sul tuo account");
}

cineteca_inail_update_viewed_numbers(bb_ajax_handler.userid);

Array.prototype.unique = function() {
    var a = this.concat();
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }
    return a;
};