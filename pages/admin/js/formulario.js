$(document).ready(function () {
    // Escucha el evento submit del formulario
    $("#miFormulario").submit(function (event) {
        // Evita el envío del formulario tradicional
        event.preventDefault();

        // Obtiene los valores del formulario
        var formData = {
            seleccion: $("#seleccion").val(),
            desde: $("#desde").val(),
            hasta: $("#hasta").val()
        };

        // Realiza la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "update-formulario.php",
            data: formData,
            success: function (response) {
                // Maneja la respuesta exitosa aquí
                console.log("Respuesta del servidor:", response);
            },
            error: function (error) {
                // Maneja los errores aquí
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    });
});
