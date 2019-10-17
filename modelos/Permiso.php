<?php
require_once "../config/Conexion.php";

class Permiso
{
    //Metofo para hacer un constructo
    public function __construct()
    {
    }
    public function listar()
    {
        $sql = "SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }
}