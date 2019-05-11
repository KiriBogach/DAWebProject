function updateTextInput(val) {
    document.getElementById('ratingValor').value = val;
}

$(function () {

    // Botón 'Crear Proyecto'
    $('#formProyecto').submit(function (e) {
        e.preventDefault();

        // Cacheamos las búsquedas de jQuery
        let $alertaError = $('#alertaError');
        let $alertaSuccess = $('#alertaSuccess');
        let $mensajeAlertaError = $('#mensajeAlertaError');
        let $inputs = $("form#formProyecto :input");
        let $foto = $('#foto');

        // Contenido de los datos que enviamos al servidor
        let form_data = new FormData();

        // Rellenamos los datos a enviar de los inputs
        // Si hay algun input vacío mostramos error
        let exito = true;
        $inputs.each(function () {
            let input = $(this);
            let id = input.attr('id');

            // Si tiene id: los elementos que nos interesan
            if (id && id.length > 0) {
                let value = input.val();
                if (!value || value.length === 0) {
                    $mensajeAlertaError.html("Error en el parámetro: " + id)
                    $alertaError.show();
                    exito = false;
                    return;
                }
                form_data.append(id, value);
            }
        });


        window.scrollTo(0, 0);

        // Si algún input está vacío no enviamos la petición al servidor
        if (!exito) {
            return;
        }

        // Cogemos la foto adjunta
        let file_data = $foto.prop('files')[0];
        form_data.append('foto_file', file_data);


        // Quitamos el valor de los inputs (los dejamos vacíos)
        $inputs.each(function () {
            $(this).val("");
        });

        // Lanzamos la petición AJAX con la foto y los inputs
        $.ajax({
            url: 'ajax/Projects/addProject',
            type: 'post',
            dataType: 'json',  // esperamos una respuesta en JSON
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                if (!data.success) {
                    // Si no tenemos éxito mostramos el error
                    $mensajeAlertaError.html("Error creando el proyecto");
                    $alertaError.show();
                } else {
                    // Si hay éxito, alertamos y vamos a la página principal
                    $.when($alertaSuccess.show().fadeOut(6000))
                        .done(function () {
                            window.location.href = "index.php";
                        });
                }

            }
        });
    });

});