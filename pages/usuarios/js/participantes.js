// Inicializar DataTable con opciones de búsqueda y exportación
$(document).ready(function() {
    $('#miTabla').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        dom: 'Bfrtip',
        buttons: [
            {
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
            }
        ]
        
    });

    $(document).ready(function () {
        // Agrega un evento clic a todas las filas de la tabla
        $('#miTabla tbody').on('click', 'tr', function () {
           // Obtiene los datos de la fila clicada
            var idParticipante = $(this).find('td:eq(0)').text();
            var nombreParticipante = $(this).find('td:eq(1)').text();
            var cedulaParticipante = $(this).find('td:eq(2)').text();
            var tipoDocumentoParticipante = $(this).find('td:eq(3)').text();    
            var celularParticipante = $(this).find('td:eq(4)').text();
            var correoParticipante = $(this).find('td:eq(5)').text();
            var objetivosParticipante = $(this).find('td:eq(6)').text();
            var tratamientoParticipante = $(this).find('td:eq(7)').text();
            var detalleTratamientoParticipante = $(this).find('td:eq(8)').text();
            var fechaHoraRegistro = $(this).find('td:eq(13)').text();
    
      
           // Configura el contenido del modal con los datos de la fila
             $('#idParticipante').val(idParticipante);
             $('#nombreParticipante').val(nombreParticipante);
             $('#cedulaParticipante').val(cedulaParticipante);
             $('#tipoDocumentoParticipante').val(tipoDocumentoParticipante);
             $('#celularParticipante').val(celularParticipante);
             $('#correoParticipante').val(correoParticipante);
             $('#objetivosParticipante').val(objetivosParticipante);
             $('#tratamientoParticipante').val(tratamientoParticipante);
             $('#detalleTratamientoParticipante').val(detalleTratamientoParticipante);
             $('#fechaHoraRegistro').val(fechaHoraRegistro);

    
     
           // Agrega más líneas según sea necesario para otros datos
     
           // Abre el modal
           $('#modalFichaParticipante').modal('show');
        });
     });
     
});
