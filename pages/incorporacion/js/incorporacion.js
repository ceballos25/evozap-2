// Inicializar DataTable con opciones de búsqueda y exportación
$(document).ready(function () {
    $('#miTabla').DataTable({
       language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
       },
       dom: 'Bfrtip',
       buttons: [{
          extend: 'excelHtml5',
          text: '<i class="p-0 text-white mdi mdi-file-excel"></i>',
          className: 'b-none mx-2 p-0 btn-sm bg-success btn btn-success btn-icon'
       }]
    });
 });
 
 
 $(document).ready(function () {
    // Agrega un evento clic a todas las filas de la tabla
    $('#miTabla tbody').on('click', 'tr', function () {
       // Obtiene los datos de la fila clicada
       var id = $(this).find('td:eq(0)').text();
       var nombre = $(this).find('td:eq(1)').text();
       var cedula = $(this).find('td:eq(2)').text();
       var tipo_documento = $(this).find('td:eq(3)').text();
       var celular = $(this).find('td:eq(4)').text();
       var correo = $(this).find('td:eq(5)').text();
       var objetivos = $(this).find('td:eq(6)').text();
       var tratamiento = $(this).find('td:eq(7)').text();
       var detalle_tratamiento = $(this).find('td:eq(8)').text();
       var cedula_referido = $(this).find('td:eq(9)').text();
       var fecha_registro = $(this).find('td:eq(14)').text();
 
 
       // Puedes continuar obteniendo otros datos según sea necesario
 
       // Configura el contenido del modal con los datos de la fila
       $('#idParticipante').val(id);
       $('#nombreParticipante').val(nombre);
       $('#cedulaParticipante').val(cedula);
       $('#tipoDocumentoParticipante').val(tipo_documento);
       $('#celularParticipante').val(celular);
       $('#correoParticipante').val(correo);
       $('#objetivosParticipante').val(objetivos);
       $('#tratamientoParticipante').val(tratamiento);
       $('#detalleTratamientoParticipante').val(detalle_tratamiento);
       $('#cedulaReferidoParticipante').val(cedula_referido);
       $('#cfechaRegistroParticipante').val(fecha_registro);
 
       // Agrega más líneas según sea necesario para otros datos
 
       // Abre el modal
       $('#modalFichaParticipante').modal('show');
    });
 });
 
 
 $(document).ready(function () {
    $('#habilitarEditar').click(function () {      
       // Toggle para agregar/quitar la clase 'no-editar'
       $('#nombreParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop; // Invierte el valor actual del atributo 'readonly'
       });
 
       $('#cedulaParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#tipoDocumentoParticipante').toggleClass('no-editar').prop('disabled', function (_, prop) {
          return !prop;
       });
 
       $('#celularParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#correoParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#objetivosParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#tratamientoParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#detalleTratamientoParticipante').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
         // Agregar/quitar la clase 'd-none'
        $('#habilitarEditar').addClass('d-none-fade');
    });
 });
 
 
 //FUNCION PARA EDITAR PARTICIPANTE
 $(document).ready(function () {
    // Capturar el evento submit del formulario
    $('#modalFichaParticipante form').submit(function (event) {
       event.preventDefault(); // Prevenir el envío del formulario por defecto
 
       // Obtener el valor actualizado del campo #nombreParticipante
       var valorIdParticipante = $('#idParticipante').val();
 
       // Obtener los datos del formulario
       var formData = $(this).serialize();
 
       // Realizar la solicitud Ajax
       $.ajax({
          type: 'POST',
          url: 'editar-participante.php',
          data: formData,
          success: function (response) {
             // Ocultar el modal de edición
             $('#modalFichaParticipante').modal('hide');
             console.log(response);
 
 
             // Pasar la variables id del formulario para matricular
             $('#valorIdParticipante').val(valorIdParticipante);
             $('#modalConfirmarEdicion').modal('show');
 
          },
          error: function (error) {
             // Manejar errores de la solicitud
             alert("Algo salió mal");
             console.log(error.responseText);
          }
       });
    });
 });
 
 
 //FUNCION PARA MATRICULAR DESDE EL MODAL
 $(document).ready(function () {
    // Capturar el evento submit del formulario
    $('#modalConfirmarEdicion form').submit(function (event) {
       event.preventDefault(); // Prevenir el envío del formulario por defecto
 
       // Obtener los datos del formulario
       var formData = $(this).serialize();
 
       // Realizar la solicitud Ajax
       $.ajax({
          type: 'POST',
          url: 'matricular.php',
          data: formData,
          success: function (response) {
             // Ocultar el modal de edición
             $('#modalConfirmarEdicion').modal('hide');
 
             // Analizar la respuesta JSON
             var jsonResponse = JSON.parse(response);
 
             // Verificar el estado de la respuesta
             if (jsonResponse.status === 'success') {
                // Mostrar alerta de confirmación
                alert('El participante ha sido Matriculado.');
                // Recargar la tabla
                location.reload();
             } else {
                // Mostrar alerta de error si la matrícula falló
                alert('Error al matricular: ' + jsonResponse.message);
             }
          },
          error: function (error) {
             // Manejar errores de la solicitud
             alert('Algo salió mal');
             console.log(error.responseText);
          }
       });
    });
 });
 
 
 // Función para matricular_1 se obtiene el evento del boton, luego el formulario
 $(document).ready(function () {
    // Captura el clic del botón con ID matricular_1
    $('#matricular_1').click(function () {
 
       // Obtengo el id a matricular
       var valorIdParticipanteMatricular = $('#idParticipante').val();
       $('#valorIdParticipanteMatricular').val(valorIdParticipanteMatricular);
 
       // Muestra el modal con ID modalMatricular_1
       $('#modalFichaParticipante').modal('hide');
       $('#modalMatricular_1').modal('show');
    });
 
 
    // Evento submit del formulario modalConfirmarEdicion
    $('#modalMatricular_1 form').submit(function (event) {
       event.preventDefault(); // Prevenir el envío del formulario por defecto
 
       // Obtener los datos del formulario
       var formData = $(this).serialize();
 
       // Realizar la solicitud Ajax
       $.ajax({
          type: 'POST',
          url: 'matricular_2.php',
          data: formData,
          success: function (response) {
             // Ocultar el modal de edición
             $('#modalConfirmarEdicion').modal('hide');
             $('#modalMatricular_1').modal('hide');
 
             // Analizar la respuesta JSON
             var jsonResponse = JSON.parse(response);
 
             // Verificar el estado de la respuesta
             if (jsonResponse.status === 'success') {
                // Mostrar alerta de confirmación
                alert('El participante ha sido Matriculado.');
                // Recargar la tabla
                location.reload();
             } else {
                // Mostrar alerta de error si la matrícula falló
                alert('Error al matricular: ' + jsonResponse.message);
             }
          },
          error: function (error) {
             // Manejar errores de la solicitud
             alert('Algo salió mal');
             console.log(error.responseText);
          }
       });
    });
 });