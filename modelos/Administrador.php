<?php

require_once "../config/Conexion.php";

class Administrador
{
    //implementamos un constructor
    public function __construct()
    {
    }

    //Implementamos el metodo para modificar o actualizar
    public function editar($idconsulta,$tipo_estado,$solucion,$modo_contacto)
    {
        $sql = "UPDATE consulta SET tipo_estado='$tipo_estado', solucion='$solucion',modo_contacto='$modo_contacto'
                WHERE  idconsulta='$idconsulta'";

        return ejecutarConsulta($sql);

    }
    //Implementamos el metodo para listar los regitros PErO SOLO LA LISTA DE PENDIENTES Y EN PROCESO
    public function listar()
    {
        $sql = "SELECT CO.idconsulta, US.nombre, US.area, US.email, CO.problema, CO.tipo_problema,CO.estado, CO.tipo_estado,date(CO.fecha_hora) as fecha 
                FROM usuarios US JOIN consulta CO
                ON US.idusuarios = CO.idusuario
                WHERE CO.tipo_estado IN ('Pendiente','En Proceso') AND CO.condicion=''";
        return ejecutarConsulta($sql);

    }

    //Metodo para listar loos ejecutados solo de los administradores
    public function listarAdmin()
    {
        $sql = "SELECT US.nombre,CO.problema,CO.tipo_problema,CO.solucion, CO.modo_contacto, CO.tipo_estado 
                FROM usuarios US JOIN consulta CO
                ON US.idusuarios = CO.idusuario
                WHERE CO.tipo_estado = 'Ejecutado'";
        return ejecutarConsulta($sql);

    }

    public function mostrar($idconsulta)
    {
        $sql = "SELECT idconsulta,modo_contacto,tipo_estado, solucion
                FROM consulta
                WHERE idconsulta = '$idconsulta'";
        return ejecutarConsultasSimpleFila($sql);
    }

}