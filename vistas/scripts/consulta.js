var tabla;

//funcion que se ejecuta al inicio

function init() {

    mostrarform(false);
    listar();


    $("#formularioEdit").on("submit", function (e) {
        editar(e);
    });
    $("#formularioReg").on("submit", function (e) {
        insertar(e);
    });

}

//funcion limpiar
function limpiar()
{
    $("#idconsulta").val("");


}

function mostrarform(flag) {
    limpiar();
    if (!flag)
    {
        $("#formulario").show();
        $("#btnGuardarEdit").show();

    }else {

        $("#modal-registro").modal('show');

    }

}
function insertar(e)
{
    e.preventDefault(); // NO se activara la accion predeterminada del evento
    $("#btnGuardarReg").prop("disabled", true);
    var formData = new FormData($("#formularioReg")[0]);

    $.ajax({

        url : '../ajax/consulta.php?op=insertar',
        type: "POST",
        data : formData,
        contentType : false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();

        }
    });
    $("#modal-registro").modal('hide');

    limpiar();
}

function editar(e)
{
    e.preventDefault(); // NO se activara la accion predeterminada del evento
    $("#btnGuardarEdit").prop("disabled", true);
    var formData = new FormData($("#formularioEdit")[0]);

    $.ajax({

        url : '../ajax/consulta.php?op=editar',
        type: "POST",
        data : formData,
        contentType : false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();

        }
    });
    $("#modal-edit").modal('hide');

    limpiar();
}
function mostrar(idconsulta)
{
    $("#modal-edit").modal('show');
    $("#btnGuardarEdit").prop("disabled", false)
    $.post("../ajax/consulta.php?op=mostrar",{idconsulta: idconsulta}, function (data, status)
    {
        data = JSON.parse(data);
        $("#idconsulta").val(data.idconsulta);
        $("#problema").val(data.problema);
        $("#tipo_problema").val(data.tipo_problema);
        $("#estado").val(data.estado);

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
                    url : '../ajax/consulta.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);

                    }
                },
            "bDestroy": true,
            "iDisplayLength": 5,//Paginacion
            "order": [[0,"desc"]],
            

        }
    ).DataTable();
}

function anular(idconsulta) {

    bootbox.confirm("Estas seguro de anular el requerimiento ?", function (result) {
        if (result)
        {
            $.post("../ajax/consulta.php?op=anular", {idconsulta: idconsulta}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            })
        }
    })

}

init();