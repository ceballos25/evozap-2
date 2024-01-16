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
                className: 'b-none mx-2 p-0 btn-sm bg-success btn btn-success btn-icon'
            }
        ]
    });
});
