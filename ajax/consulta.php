<?php
session_start();
require_once "../modelos/Consulta.php";

$consulta = new Consulta();

$idconsulta      = isset($_POST["idconsulta"])? limpiarCadena($_POST["idconsulta"]) : "" ;
$idusuario       = $_SESSION["idusuarios"];
$problema        = isset($_POST["problema"])? limpiarCadena($_POST["problema"]) : "" ;
$tipo_problema   = isset($_POST["tipo_problema"])? limpiarCadena($_POST["tipo_problema"]) : "" ;
$estado          = isset($_POST["estado"])? limpiarCadena($_POST["estado"]) : "" ;



switch ($_GET["op"])
{
    case'insertar':

        if (empty($idconsulta))
        {
            $rspta = $consulta->insertar($idusuario,$problema,$tipo_problema,$estado);

            include "correo.php";

            echo $rspta? "Petición solicitada": "No se ha podido mandar la peticion..";
        }

        break;
    case 'editar':

            $rspta = $consulta->editar($idconsulta,$problema,$tipo_problema,$estado);

            echo $rspta? "Se ha Actualizado la petición": "Error al ejecutar ..";

        break;
    case 'mostrar':
        $rspta = $consulta->mostrar($idconsulta);

        echo json_encode($rspta);
        break;

    case 'listar':

        $rspta = $consulta->listar($idusuario);

        //Vamos a declarar un array
        $data= array();

        $n = 1;
        while ($reg = $rspta->fetch_object())
        {
            $data[]= array(

                "0"=>$n++,
                "1"=>$reg->problema,
                "2"=>$reg->tipo_problema,
                "3"=>$reg->estado,
                "4"=>$reg->fecha,
                "5"=>($reg->condicion=='')?'<button class="open-modal btn-info" onclick="mostrar('.$reg->idconsulta.')"><i class="fa fa-pencil"></i></button>
                                        '.' <button class="open-modal btn-warning" onclick="anular('.$reg->idconsulta.')"><i class="fa fa-ban"></i></button>':'<span class="label label-danger arrowed">Anulado</span>',
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
    case'anular':

        $rspta = $consulta->anular($idconsulta);

        echo $rspta?"Requerimiento anulado": "Error al anular el requerimiento";
        break;
}