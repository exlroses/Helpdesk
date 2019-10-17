var tabla;

//funcion que se ejecuta al inicio

function init() {

    mostrarform(false);
    listar();

    //evento para guardar y editar
    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })
    $("#imagenmuestra").hide();


    //ACA MOSTRAMOS LOS PERMISOS
    $.post("../ajax/usuario.php?op=permisos&id=",function(r){
        $("#permisos").html(r);
    });
}

//funcion limpiar
function limpiar()
{
    $("#idusuarios").val("");
    $("#nombre").val("");
    $("#dni").val("");
    $("#area").val("");
    $("#email").val("");
    $("#login").val("");
    $("#cargo").val("");
    $("#clave").val("");
    $("#permisos").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val();

}

function mostrarform(flag) {

    limpiar();
    if (flag)
    {

        $("#listadoregistros").hide();
        $("#formularioregistro").show();
        $("#btnGuardar").prop('disabled',false);
        $("#btnagregar").hide();

    }else
    {
        $("#listadoregistros").show();
        $("#formularioregistro").hide();
        $("#btnagregar").show();
    }
}

//funcion cancelar form
function cancelarform()
{
    limpiar();
    mostrarform(false);
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
                    url : '../ajax/usuario.php?op=listar',
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

function guardaryeditar(e)
{
    e.preventDefault(); //no se activara la accion predeteminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url : "../ajax/usuario.php?op=guardaryeditar",
        type : "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos)
        {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(idusuarios)
{
    $.post("../ajax/usuario.php?op=mostrar", {idusuarios: idusuarios}, function(data, status)
    {
        data=  JSON.parse(data);

        //console.log(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#dni").val(data.dni);
        $("#area").val(data.area);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idusuarios").val(data.idusuarios);

    });
    $.post("../ajax/usuario.php?op=permisos&id="+idusuarios,function(r){
        $("#permisos").html(r);
    });
}
function desactivar(idusuarios)
{
    bootbox.confirm("Está seguro de desactivar el usuario?", function (result) {

        if  (result)
        {
            $.post("../ajax/usuario.php?op=desactivar", {idusuarios: idusuarios}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            })
        }
    })
}

function activar(idusuarios)
{
    bootbox.confirm("Está seguro de activar el usuario?", function (result) {

        if  (result)
        {
            $.post("../ajax/usuario.php?op=activar", {idusuarios: idusuarios}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}
init();