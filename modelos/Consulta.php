<?php

require_once "../config/Conexion.php";

class Consulta
{
    //implementamos un constructor
    public function __construct()
    {
    }


    //Implementamos un método para insertar registros
    public function insertar($idusuario,$problema,$tipo_problema,$estado)
    {
        $sql="INSERT INTO consulta(idusuario,problema,tipo_problema,estado)
              VALUES ('$idusuario','$problema','$tipo_problema','$estado')";


        return ejecutarConsulta($sql);

    }

    //Implementamos el metodo para modificar o actualizar
    public function editar($idconsulta,$problema,$tipo_problema,$estado)
    {
        $sql = "UPDATE consulta SET problema='$problema',tipo_problema='$tipo_problema',estado='$estado'
                WHERE  idconsulta='$idconsulta'";
        //return ejecutarConsulta($sql);

        return ejecutarConsulta($sql);

    }
    //Implementamos el metodo para listar los regitros
    public function listar()
    {
        $sql = "SELECT idconsulta,problema, tipo_problema, estado,date(fecha_hora) as fecha, condicion FROM consulta WHERE idusuario='".$_SESSION['idusuarios']."'";
        return ejecutarConsulta($sql);

    }

    public function mostrar($idconsulta)
    {
        $sql = "SELECT * FROM consulta
                WHERE idconsulta='$idconsulta'";
        return ejecutarConsultasSimpleFila($sql);
    }

    //Metodo para cambiar la condicion a anulado el requrimiento
    public function anular($idconsulta)
    {
        $sql = "UPDATE consulta SET condicion = 'Anulado'
                WHERE idconsulta='$idconsulta'";
        return ejecutarConsulta($sql);
    }

}