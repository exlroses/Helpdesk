<?php


function estado($e)
{
    $estado = "";

    $pendiente = "Pendiente";
    $proceso = "En Proceso";
    $ejecutado = "Ejecutado";
    $analicis = "no encontrado";

    switch ($e) {
        case $pendiente:
            $estado = "<span class='label label-danger arrowed'>Pendiente</span>";
            break;
        case $proceso:
            $estado = "<span class='label label-warning arrowed'>En Proceso</span>";
            break;
        case $ejecutado:
            $estado = "<span class='label label-success arrowed'>Ejecutado</span>";
            break;
        case $analicis:
            $estado;
        default:
            $estado = "Estado no encontrado";
            break;
    }
    return $estado;
}

