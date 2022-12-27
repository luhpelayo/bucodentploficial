$(document).ready(function() {
    $('#table_id').DataTable( {
        "language": {
            "lengthMenu": "Mostrando _MENU_ filas de datos",
            "zeroRecords": "No se ha encontrado nada - lo siento",
            "info": "Mostrando _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ filas en total)"
        }
    } );
} );