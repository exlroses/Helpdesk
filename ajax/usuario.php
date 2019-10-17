<?php
session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$idusuarios = isset($_POST["idusuarios"])? limpiarCadena($_POST["idusuarios"]) : "" ;
$nombre    = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "" ;
$dni       = isset($_POST["dni"])? limpiarCadena($_POST["dni"]) : "" ;
$area      = isset($_POST["area"])? limpiarCadena($_POST["area"]) : "" ;
$email     = isset($_POST["email"])? limpiarCadena($_POST["email"]) : "" ;
$cargo     = isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]) : "" ;
$login     = isset($_POST["login"])? limpiarCadena($_POST["login"]) : "" ;
$clave     = isset($_POST["clave"])? limpiarCadena($_POST["clave"]) : "" ;
$imagen    = isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]) : "" ;

switch ($_GET["op"])
{
    case 'guardaryeditar':
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
        {
            $imagen=$_POST["imagenactual"];
        }
        else
        {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
            {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
            }
        }

        //HASH sha256 en la contraseña
    $clavehash = hash("SHA256", $clave);
        if (empty($idusuarios))
        {
            $rspta=$usuario->insertar($nombre,$dni,$area,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);

            echo $rspta? "Usuario Registrado": "No se ha registrado todos los datos..";
        }else
        {
            $rspta = $usuario->editar($idusuarios,$nombre,$dni,$area,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
            echo $rspta? "Usuario Actualizado": "Error al Actualizar ..";
        }
        break;

    case 'mostrar':
        $rspta = $usuario->mostrar($idusuarios);
        // cod  ificar el resultado usando json

        echo json_encode($rspta);
        break;
    case 'activar':
        $rspta = $usuario->activar($idusuarios);
        echo $rspta?"Se ha activado el usuario":"Error al activar el usuario";
        break;
    case 'desactivar':

        $rspta = $usuario->desactivar($idusuarios);
        echo $rspta?"Se ha Desactivado el usuario":"Error al Desactivar el usuario";
        break;
    case 'listar':

        $rspta = $usuario->listar();


        //Vamos a declarar un array
        $data= array();

        $n = 1;
        while ($reg = $rspta->fetch_object())
        {
            $data[]= array(

                "0"=>$n++,
                "1"=>$reg->nombre,
                "2"=>$reg->dni,
                "3"=>$reg->area,
                "4"=>$reg->email,
                "5"=>$reg->cargo,
                "6"=>$reg->login,
                "7"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px'>",
                "8"=>($reg->condicion)?'<span class="label label-lg label-success arrowed-in arrowed-in-right">Activado</span>' :'<span class="label label-lg label-danger arrowed-in arrowed-in-right">Desactivado</span>',
                "9"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuarios.')"><i class="fa fa-pencil"></i></button>'.
                                        ' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuarios.')"><i class="fa fa-close"></i></button>':
                                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuarios.')"><i class="fa fa-pencil"></i></button>'.
                                        ' <button class="btn btn-primary" onclick="activar('.$reg->idusuarios.')"><i class="fa fa-check"></i></button>',
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

    case'permisos':
        //obtenermos todos los permisos de la tabla
        require_once "../modelos/Permiso.php";

        $permiso = new Permiso();
        $rspta = $permiso->listar();

        //Obtenemos los permisos asignados
        $id = $_GET["id"];
        $marcados = $usuario->listarMarcados($id);


        //lo siguiente es declarar un array
        $valores = array();
        //luego almacenar los permisos asignados al usuario  en el array
        while ($per = $marcados->fetch_object())
        {
            array_push($valores, $per->idpermiso);
        }

        //Mosttramos la lista de permisos de la vista y si estan marcados o no

        while ($reg = $rspta->fetch_object())
        {
            $sw = in_array($reg->idpermiso, $valores)?'checked': '';
            echo'
            <div class="checkbox">
			    <label>
			    	<input type="checkbox" '.$sw.' name="permiso[]" class="ace" value="'.$reg->idpermiso.'" />
			        <span class="lbl">'.$reg->nombre.'</span>
				</label>
			</div>';
        }

        break;

    case 'verificar':

        $logina = $_POST['logina'];
        $clavea = $_POST['clavea'];

        //la clave es incriptado y vamos a comparar la enriptacion
        $clavehash = hash("SHA256", $clavea);

        $rspta = $usuario->verificar($logina, $clavehash);

        $fetch = $rspta->fetch_object();

        if (isset($fetch))
        {
            //Declaramos las variables de sesion
            $_SESSION["idusuarios"] = $fetch->idusuarios;
            $_SESSION["nombre"] = $fetch->nombre;
            $_SESSION["dni"] = $fetch->dni;
            $_SESSION["area"] = $fetch->area;
            $_SESSION["email"] = $fetch->email;
            $_SESSION["cargo"] = $fetch->cargo;
            $_SESSION["login"] = $fetch->login;
            $_SESSION["imagen"] = $fetch->imagen;

            //Obtenemos lo permisos del usuario para qu se logee deacuerdo a lo asignado
            $marcados = $usuario->listarMarcados($fetch->idusuarios);
            //declaramos el arra para almacenar  todos los permisos
            $valores = array();
            //Almacenamos los permisos marcados en el array
            while ($per = $marcados->fetch_object())
            {
                array_push($valores, $per->idpermiso);
            }
            //Determinamos los accesos del usuario
            in_array(1,$valores)?$_SESSION["escritorio"]=1 : $_SESSION["escritorio"]=0;
            in_array(2,$valores)?$_SESSION["requerimientos"]=1 : $_SESSION["requerimientos"]=0;
            in_array(3,$valores)?$_SESSION["concluidos"]=1 : $_SESSION["concluidos"]=0;

        }

        echo json_encode($fetch);

        break;

    case 'salir':

        //Limpiamos las variables de sesion
        session_unset();
        //destruimos la sesion
        session_destroy();
        //Redireccionamos al login
        header("location: ../index.php");
        break;
}