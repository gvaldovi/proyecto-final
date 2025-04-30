$(".table").DataTable({    
    "ordering": false,
    "language": {      
        "sSearch": "Buscar:",
        "sEmptyTable": "No hay datos en la Tabla",
        "sZeroRecords": "No se encontraron resultados",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
        "SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
    "sLoadingRecords": "Cargando...",
    "sLengthMenu": "Mostrar _MENU_ registros"    
    }
});

//Editar Sucursales ===================================
$(".table").on('click','.btnEditarSucursal',function(){
    let idSucursal = $(this).attr('idSucursal');

    $.ajax({
        url: 'branches/'+idSucursal+'/edit',
        type: 'GET',
        success: function(sucursal){
            $("#nombreEditar").val(sucursal.name);
            $("#idEditar").val(sucursal.id);
    }
    })
})