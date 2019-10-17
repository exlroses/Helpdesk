<?php
session_start();
require_once "../modelos/Administrador.php";

$administrador = new Administrador();

$idconsulta      = isset($_POST["idconsulta"])? limpiarCadena($_POST["idconsulta"]) : "" ;
$tipo_estado     = isset($_POST["tipo_estado"])? limpiarCadena($_POST["tipo_estado"]) : "" ;
$solucion        = isset($_POST["solucion"])? limpiarCadena($_POST["solucion"]) : "" ;
$modo_contacto   = isset($_POST["modo_contacto"])? limpiarCadena($_POST["modo_contacto"]) : "" ;



switch ($_GET["op"])
{
    case 'editar':

        $rspta = $administrador->editar($idconsulta,$tipo_estado,$solucion,$modo_contacto);

        echo $rspta? "Se ha mandado el estado": "Error al mandar el estado ..";

        break;
    case 'mostrar':
        $rspta = $administrador->mostrar($idconsulta);

        echo json_encode($rspta);
        break;

    case 'listar':

        require_once "help.php";
        $rspta = $administrador->listar();

        //Vamos a declarar un array
        $data= array();

        $n = 1;
        while ($reg = $rspta->fetch_object())
        {
            $data[]= array(

                "0"=>$n++,
                "1"=>$reg->nombre,
                "2"=>$reg->area,
                "3"=>$reg->email,
                "4"=>$reg->problema,
                "5"=>$reg->tipo_problema,
                "6"=>$reg->estado,
                "7"=> estado($reg->tipo_estado),
                "8"=>$reg->fecha,
                "9"=>'<button class="open-modal btn-warning" onclick="mostrar('.$reg->idconsulta.')"><i class="fa fa-eye"></i></button>
                    ',
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

        // CASO PArA MOSTRAR SOLO A LOS ADMINISTRAORES EJECUTADOS
    case 'listarAdmin':

        require_once "help.php";
        $rspta = $administrador->listarAdmin();

        //Vamos a declarar un array
        $data= array();

        $n = 1;
        while ($reg = $rspta->fetch_object())
        {
            $data[]= array(

                "0"=>$n++,
                "1"=>$reg->nombre,
                "2"=>$reg->problema,
                "3"=>$reg->tipo_problema,
                "4"=>$reg->solucion,
                "5"=>$reg->modo_contacto,
                "6"=> estado($reg->tipo_estado),
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