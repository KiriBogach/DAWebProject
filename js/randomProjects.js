
$(function () {

    $('#botonInvertir').click(function(){
        let proyecto = $(this);
        let idProyecto = proyecto.attr('name')
        window.location.href = "inversion.php?id=" + idProyecto;
    });

});