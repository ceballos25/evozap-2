$(document).ready(function () {
   $('#tableAdministrativos').DataTable({
       language: {
           url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
       },
       "order": [[0, 'desc']],
       dom: 'Bfrtip',
       buttons: [{
           extend: 'excelHtml5',
           text: '<i class="p-0 text-white mdi mdi-file-excel"></i>',
           className: 'b-none mx-2 p-0 btn-sm bg-success btn btn-success btn-icon',
           init: function(api, node, config) {
               // Inicializar el tooltip
               $(node).tooltip({
                   container: 'body',
                   html: true,
                   title: '<em>Exportar a Excel</em>',
               });
           },
           action: function (e, dt, button, config) {
               // Lógica de exportación a Excel
               dt.button(button).trigger();
           }
       }]
   });
});

 
 //inicialización del tootip, se debe incluir popper o boostrap bundle que ya lo tiene
   var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
   var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
   return new bootstrap.Tooltip(tooltipTriggerEl)
   })
 
 $(document).ready(function () {
    // Agrega un evento clic a todas las filas de la tabla
    $('#tableAdministrativos tbody').on('click', 'tr', function () {
       // Obtiene los datos de la fila clicada
       var idAdministrativo = $(this).find('td:eq(0)').text();
       var nombreAdministrativo = $(this).find('td:eq(1)').text();
       var cedulaAdministrativo = $(this).find('td:eq(2)').text();
       var celularAdministrativo = $(this).find('td:eq(3)').text();
       var correoAdministrativo = $(this).find('td:eq(4)').text();
       var direccionAdministrativo = $(this).find('td:eq(5)').text();
       var cargoAdministrativo = $(this).find('td:eq(6)').text();
       var rolAdministrativo = $(this).find('td:eq(7)').text();

  
       // Configura el contenido del modal con los datos de la fila
       $('#idAdministrativo').val(idAdministrativo);
       $('#nombreAdministrativo').val(nombreAdministrativo);
       $('#cedulaAdministrativo').val(cedulaAdministrativo);
       $('#celularAdministrativo').val(celularAdministrativo);
       $('#correoAdministrativo').val(correoAdministrativo);
       $('#direccionAdministrativo').val(direccionAdministrativo);
       $('#cargoAdministrativo').val(cargoAdministrativo);
       $('#rolAdministrativo').val(rolAdministrativo);

 
       // Agrega más líneas según sea necesario para otros datos
 
       // Abre el modal
       $('#modalFichaAdministrativo').modal('show');
    });
 });
 
 
 $(document).ready(function () {
    $('#habilitarEditar').click(function () {      
       // Toggle para agregar/quitar la clase 'no-editar'
       $('#nombreAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop; // Invierte el valor actual del atributo 'readonly'
       });
 
       $('#cedulaAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#celularAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#correoAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#direccionAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });
 
       $('#cargoAdministrativo').toggleClass('no-editar').prop('readonly', function (_, prop) {
          return !prop;
       });

       $('#rolAdministrativo').toggleClass('no-editar').prop('disabled', function (_, prop) {
         return !prop;
      });
 
         // Agregar/quitar la clase 'd-none'
        $('#habilitarEditar').addClass('d-none-fade');
    });
 });
 
 
 //FUNCION PARA EDITAR ADMINISTRATIVO
 $(document).ready(function () {
    // Capturar el evento submit del formulario
    $('#modalFichaAdministrativo form').submit(function (event) {
       event.preventDefault(); // Prevenir el envío del formulario por defecto
  
       // Obtener los datos del formulario
       var formData = $(this).serialize();
 
       // Realizar la solicitud Ajax
       $.ajax({
          type: 'POST',
          url: 'editar-administrativo.php',
          data: formData,
          success: function (response) {
             // Ocultar el modal de edición
             $('#modalFichaAdministrativo').modal('hide');
             alert("Datos Actualizados");
             console.log(response);

             // Recargar la página
             location.reload();
          },
          error: function (error) {
             // Manejar errores de la solicitud
             alert("Algo salió mal");
             console.log(error.responseText);
          }
       });
    });
 });


 //FUNCION PARA AGREGAR UN NUEVO ADMINISTRATIVO
 $(document).ready(function () {
   // Agrega un evento clic a todas las filas de la tabla
   $('#btnAddAdministrativo').on('click',function () {

      // Abre el modal
      $('#modalFichaAddAdministrativo').modal('show');
   });
});


 //FUNCION PARA CREAR ADMINISTRATIVO
 $(document).ready(function () {
   // Capturar el evento submit del formulario
   $('#modalFichaAddAdministrativo form').submit(function (event) {
      event.preventDefault(); // Prevenir el envío del formulario por defecto
 
      // Obtener los datos del formulario
      var formData = $(this).serialize();

      // Realizar la solicitud Ajax
      $.ajax({
         type: 'POST',
         url: 'crear-administrativo.php',
         data: formData,
         success: function (response) {
            // Ocultar el modal de edición
            $('#modalFichaAddAdministrativo').modal('hide');
            alert("Administrativo Creado Correctamente");
            console.log(response);

            // Recargar la página
            location.reload();
         },
         error: function (error) {
            // Manejar errores de la solicitud
            alert("Algo salió mal, contacte al desarrollador");
            console.log(error.responseText);
         }
      });
   });
});
