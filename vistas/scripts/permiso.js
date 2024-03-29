var tabla;

//funcion que se ejecuta al inicio

function init() {

    mostrarform(false);
    listar();

}


function mostrarform(flag) {

    if (flag)
    {

        $("#listadoregistros").hide();
        $("#formularioregistro").show();
        $("#btnGuardar").prop('disabled',false);
        $("#btnAgregar").hide();

    }else
    {
        $("#listadoregistros").show();
        $("#formularioregistro").hide();
        $("#btnAgregar").show();
    }
}

function listar()
{
    tabla = $("#tbllistado").dataTable(
        {
            "sProcessing" : true, // activamos el procesamiento del datatables
            "aServerSide" : true, // Paginacion y filtrado realizados por el servidor
            dom: "Bfrtip", // Definimos los elementos  del control de tabla
            buttons: [

                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],

            "ajax":
                {
                    url : '../ajax/permiso.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);

                    }
                },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginacion
            "order": [[0,"desc"]]
        }
    ).DataTable();
}

init();