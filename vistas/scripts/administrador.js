var tabla;

//funcion que se ejecuta al inicio

function init() {

    mostrarform(false);
    listar();
    listarAdmin();


    $("#formularioEdit").on("submit", function (e) {
        editar(e);
    });

}

//funcion limpiar
function limpiar()
{
    $("#idconsulta").val("");


}

function mostrarform(flag) {
    limpiar();
    if (!flag) {
        $("#formulario").show();
        $("#btnGuardarEdit").show();
    }

}
function editar(e)
{
    e.preventDefault(); // NO se activara la accion predeterminada del evento
    $("#btnGuardarEdit").prop("disabled", true);
    var formData = new FormData($("#formularioEdit")[0]);

    $.ajax({

        url : '../ajax/administrador.php?op=editar',
        type: "POST",
        data : formData,
        contentType : false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            //tabla.ajax.reload();
            listar();

        }
    });
    $("#modal-edit").modal('hide');

    limpiar();
}
function mostrar(idconsulta)
{
    $("#modal-edit").modal('show');
    $("#btnGuardarEdit").prop("disabled", false)
    $.post("../ajax/administrador.php?op=mostrar",{idconsulta: idconsulta}, function (data, status)
    {
        data = JSON.parse(data);
        $("#idconsulta").val(data.idconsulta);
        $("#modo_contacto").val(data.modo_contacto);
        $("#tipo_estado").val(data.tipo_estado);
        $("#solucion").val(data.solucion);
    });

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
                    url : '../ajax/administrador.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);

                    }
                },
            "bDestroy": true,
            "iDisplayLength": 7,//Paginacion
            "order": [[0,"desc"]],


        }
    ).DataTable();
}

//listado solo de los admnistradores solo concluidos de la lista
function listarAdmin()
{
    tabla = $("#tbllistadoAdmin").dataTable(
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
                    url : '../ajax/administrador.php?op=listarAdmin',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);

                    }
                },
            "bDestroy": true,
            "iDisplayLength": 7,//Paginacion
            "order": [[0,"desc"]],


        }
    ).DataTable();
}

init();