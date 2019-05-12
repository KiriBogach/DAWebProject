$(function () {


    $('#proyectoInversion').submit(function(){

        let inversion = $('#inversion').val();
        let idProyecto = $('#idProyecto').attr('name');

        $.ajax({
            url: 'ajax/Projects/invertir.php',
            type: 'post',
            dataType: 'json',  // esperamos una respuesta en JSON
            data: {
                'inversion': inversion,
                'idProyecto': idProyecto
            },
            success: function (data) {
                alert('Inversión con éxito');
                location.reload();
            }
        });

        // Para que no recargue la página
        return false;
    });
});