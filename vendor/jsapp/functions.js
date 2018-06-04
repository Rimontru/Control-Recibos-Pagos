function trun(elmt, lng, typ){
	
	var frm = $('form').attr('class');
	val = $("."+frm+' #'+elmt).val();
	$("."+frm+' #'+elmt).attr("maxlength", lng);

	var regex;
	switch (typ) {
		case 1: /*any numbers*/
			regex = /^[0-9]+$/i;
			break;
		case 2: /*when is celular*/
			regex = /^\+?([0-9]|[-|' '])+$/i;
			break;
		case 3: /*when is numbers, acept slash and space*/
			regex = /^\+?([0-9]|[/|' '])+$/i;
			break;
		case 4: /*when is letras*/
            regex = /^([A-zÀ-ÿ\u00f1\u00d1]|[' '])+$/i;
			break;
		case 5: /*when is search*/
            regex = /^([A-z0-9À-ÿ\u00f1\u00d1]|[-' '])+$/i;
			break;

	}
	jsRegex = new RegExp(regex).test(val);
    if( val && !jsRegex ){
    	reval = val.substring(0,val.length-1);
 			$("."+frm+' #'+elmt).val(reval);
	  }
}

function clf (elmt, lng, typ){
	var frm = $('form').attr('class');
	val = $("."+frm+' #'+elmt).val();
	$("."+frm+' #'+elmt).attr("maxlength", lng);

	var regex = /^[0-9]+$/i;
	jsRegex = new RegExp(regex).test(val);

	if ( val.length < 2 || val == 10 ) {
		if( val && !jsRegex ){
    	reval = val.substring(0,val.length-1);
 			$("."+frm+' #'+elmt).val(reval);
		}
	} else {
 		$("."+frm+' #'+elmt).val("");
	}
 
}
