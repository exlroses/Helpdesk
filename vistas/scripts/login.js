$("#frmAcceso").on('submit', function (e) {

    e.preventDefault();
    logina = $("#logina").val();
    clavea = $("#clavea").val();

    $.post("../ajax/usuario.php?op=verificar",
        {"logina":logina, "clavea": clavea},
        function (data)
        {
            if  (data != "null")
            {
                $(location).attr("href", "requerimientos.php");
            }
            else
            {
                bootbox.alert("Usuario y/0 Password incorrectos");
            }
        });
})