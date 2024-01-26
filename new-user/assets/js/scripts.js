
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
	
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');
    
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="email"], .f1 input[type="checkbox"], .f1 textarea, .f1 select').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.f1 .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('input[type="text"], input[type="password"], input[type="email"], input[type="checkbox"], textarea, select').each(function() {
    		if( $(this).val() == "" || $(this).val() ==  "Tipo Doc.." ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}			
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation

    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(150, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.f1'), 20 );
	    	});
    	}
    	
    });

// Obtener todos los campos por clase numero-documento
var camposNumeroDocumento = document.querySelectorAll('.numero-documento');

// Agregar un "event listener" para el evento 'input' a cada campo
camposNumeroDocumento.forEach(function(campo) {
  campo.addEventListener('input', function() {
    // Obtener el valor actual del campo
    var valorCampo = campo.value;

    // Verificar si el valor contiene letras, puntos o espacios
    var contieneLetrasOPuntos = /[a-zA-Z. ]/.test(valorCampo);

    // Condición para cambiar la clase
    if (contieneLetrasOPuntos) {
      campo.classList.remove('buzz-field');  // Quitar la clase inicial
      campo.classList.add('input-error');    // Agregar la clase de error
      campo.value = ""; // Quitar los puntos y letras
    } else {
      campo.classList.remove('input-error'); // Quitar la clase de error
      campo.classList.add('buzz-field');     // Agregar la clase inicial
    }
  });
});



    // previous step
    $('.f1 .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(150, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.f1'), 20 );
    	});
    });
    
    // submit
    $('.f1').on('submit', function(e) {
    	
    	// fields validation
    	$(this).find('input[type="text"], input[type="password"], input[type="checkbox"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    });

// Obtener la casilla de verificación por su ID para cambiar estilo en caso de que no lo hayan seleccionado
var checkAcuerdo = document.getElementById('checkAcuerdo');

// Agregar un event listener para el evento 'change' en la casilla de verificación
checkAcuerdo.addEventListener('change', function() {
    // Verificar si la casilla está marcada
    if (checkAcuerdo.checked) {
        // Restaurar estilo cuando está marcada
        checkAcuerdo.style.borderColor = '#ccc';
    } else {
        // Aplicar estilo y mostrar el modal cuando no está marcada
        checkAcuerdo.style.borderColor = 'red';
        $('#myModal').modal('show');
    }
});

// Agregar un event listener para el evento 'submit' en el formulario
miFormulario.addEventListener('submit', function(event) {
    // Verificar si la casilla no está marcada y prevenir el envío del formulario
    if (!checkAcuerdo.checked) {
        event.preventDefault();
        // Mostrar el modal
        $('#myModal').modal('show');
    }
});

});
