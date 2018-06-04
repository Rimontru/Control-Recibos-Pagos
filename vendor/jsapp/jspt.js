/* -------- functions and methods javascript -------- */

/* -------- activa el formulario para realizar un accion -------- */
$('.exe').click(function(){
	make = $(this).attr('id');
	formulario = $('form').attr('class');

	if (make == '_new') {
		$('.'+formulario+' input, select').attr('disabled',false);
		$('#action').show();
		$('#make').hide();
	}

	if (make == '_del') {
		$('#trash').show();
		$('#make').hide();
		if (confirm('¿Desea eliminar el registro?')){
			ref = $("#_bam").val();
			location.href = ref;

		} else
				location.reload();
	}						

	if (make == '_cnc') {
		if (confirm('¿Desea cancelar la acción?'))
			location.reload();
			
	}

});
/* FIN function */

/* -------- Acciones de los botones -------- */
$('.exe').click(function(){
	action = $(this).attr('id');
	formulario = $('form').attr('class');

	if (action == '_sav') { /*click en guardar*/
		var ok = 0, elmnt=0, inputs = ["input:text","select"];

		for (var i = 0; i <= inputs.length; i++) {
			$('.'+formulario).find(inputs[i]).each(function(e) {
				elmnt++;
		 		var elemento = this;
		 		/*todos los elementos del form obligados a tener id*/
		 		if (elemento.value == 0 || elemento.selectedIndex == 0) 
			 		$("#"+elemento.id).css('border-bottom-color','red');
				else {
					ok++;
		 			$("#"+elemento.id).css('border-bottom-color','');
		 		}	

		  });
		}

		if ( (elmnt - ok) === 0) 
			$('.'+formulario).submit();
		else
			alert('Verifica tu llenado...');
	}
});
/* FIN function */

/* -------- block all inputs qe no sean del login -------- */
$(document).ready(function() { 

	if ( $('form').attr('id') != 'form_login' && $('form').attr('class') != "search")
		$('.form_crear input, .form_crear select').attr('disabled',true);

	
	$(".form_crear #trece").on('change', function() {
		$(".form_crear #trece option:selected").each( function() {

			grupo = $(this).text();
			dataciclo = $(".form_crear #doce option:selected").attr('ciclo');
			curso = $(".form_crear #doce option:selected").attr('curso');
			valciclo = $(".form_crear #doce option:selected").val();

			f_cur = curso.split("/");
			ini_cur = f_cur[0].replace("-", "/");

			if(valciclo != "" && valciclo != undefined && valciclo != null){
				gr = grupo.split("/");
				ci = dataciclo.split("/");
				
				insc = calcularPeriodo( gr[0].trim(), ci[0].trim(), ci[1].trim(), gr[2].trim());
				f = insc.split("-");
				fecha_ok = (ini_cur.trim())+"/"+f[2];
				/*fecha_ok = f[0]+"/"+f[2];*/

				$(".form_crear #diez").val(fecha_ok);
			} else{
					$(".form_crear #trece").val("");
					alertify.error('Seleccione el Ciclo.');
			}			

		});
	});


	$('#showNoty').click(function(){
		alert("El registro se guardo correctamente");
	});

	$("#pdf").click(function(){
		var datasPart = '';
		datasPart += 'id_ciclo='+$("#id_ciclo").val();
		datasPart += '&id_grupo='+$("#id_grupo").val();
		window.open('../../reportes/reporte_grupal_pagos.php?'+datasPart);
	});

});
