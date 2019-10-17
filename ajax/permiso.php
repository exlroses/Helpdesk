<?php

require_once "../modelos/Usuario.php";

$permiso = new Permiso();

switch ($_GET["op"])
{

    case 'listar':

        $rspta = $usuario->listar();


        //Vamos a declarar un array
        $data= array();

        while ($reg = $rspta->fetch_object())
        {
            $data[]= array(

                "0"=>$reg->nombre
            );
        }

        $results = array(
            "sEcho" =>1, //Informacion para el dataTables
            "iTotalRecords"=> count($data), //enviamos el total registros al data Tables
            "iTotalDisplayRecords" =>count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}