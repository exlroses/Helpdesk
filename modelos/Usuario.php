<?php

require_once "../config/Conexion.php";

class Usuario
{
    //implementamos un constructor
    public function __construct()
    {
    }


    //Implementamos un método para insertar registros
    public function insertar($nombre,$dni,$area,$email,$cargo,$login,$clave,$imagen,$permisos)
    {
        $sql="INSERT INTO usuarios(nombre,dni,area,email,cargo,login,clave,imagen,condicion)
              VALUES ('$nombre','$dni','$area','$email','$cargo','$login','$clave','$imagen','1')";
        //return ejecutarConsulta($sql);
        $idusuarionew=ejecutarConsulta_retornaID($sql);

        $sw=true;
        foreach ($permisos as $permiso) {
            $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso)VALUES('$idusuarionew', '$permiso')";
            ejecutarConsulta($sql_detalle) or $sw = false;
        }
        return $sw;
    }

    //Implementamos el metodo para modificar o actualizar
    public function editar($idusuarios,$nombre,$dni,$area,$email,$cargo,$login,$clave,$imagen,$permisos)
    {
        $sql = "UPDATE usuarios SET nombre ='$nombre',dni='$dni',area='$area',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen'
                WHERE  idusuarios='$idusuarios'";
        //return ejecutarConsulta($sql);
        ejecutarConsulta($sql);

        //Eliminamos todos los permisos asignados para volverlos a registrar
        $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuarios'";
        ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count($permisos))
        {
            $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarios', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos + 1;
        }

        return $sw;

    }
    //Implementamos el metodo para mostrar los datos de un registor modificado
    public function mostrar($idusuarios)
    {
        $sql= "SELECT * FROM usuarios 
               WHERE idusuarios = '$idusuarios'";

        return ejecutarConsultasSimpleFila($sql);
    }
    //Implementamos el metodo para listar los regitros
    public function listar()
    {
        $sql = "SELECT * FROM usuarios";
        return ejecutarConsulta($sql);

    }
    public function activar($idusuarios)
    {
        $sql = "UPDATE usuarios SET condicion = '1'
                WHERE idusuarios = '$idusuarios'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($idusuarios)
    {
        $sql = "UPDATE usuarios SET condicion = '0'
                WHERE idusuarios = '$idusuarios'";
        return ejecutarConsulta($sql);
    }
    //Implementamos el metodo para  eleiminar el usuario
    public function eleiminar($idusuarios)
    {
        $sql = "DELETE FROM usuarios WHERE idusuarios= '$idusuarios'";

        return ejecutarConsulta($sql);
    }

    //Implementar un metodo para listar los permisos marcados(reflejar en la vista)
    public function listarMarcados($idusuario)
    {
        $sql = "SELECT * FROM usuario_permiso
                WHERE idusuario = '$idusuario'";

        return ejecutarConsulta($sql);
    }

    //Implementar un metodo la ingresar al sistema con el login
    public function verificar($login, $clave)
    {
        $sql = "SELECT idusuarios, nombre, dni, area, email, cargo, login, imagen 
                FROM usuarios 
                WHERE login = '$login' AND clave = '$clave' AND condicion = '1'";

        return ejecutarConsulta($sql);
    }


    /*
     * Metodo para evaluar las cantidades de requerimientos y usuarios
     */

    public function admin()
    {
        $sql = "SELECT cargo FROM usuarios WHERE cargo = 'Administrador'";
        return ejecutarConsulta($sql);
    }
    public function usuario()
    {
        $sql = "SELECT cargo FROM usuarios WHERE cargo = 'Usuario'";
        return ejecutarConsulta($sql);
    }

    public function Pendiente()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE tipo_estado = 'Pendiente'";
        return ejecutarConsulta($sql);
    }
    public function Enproceso()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE tipo_estado = 'En Proceso'";
        return ejecutarConsulta($sql);
    }
    public function concluido()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE tipo_estado = 'Ejecutado '";
        return ejecutarConsulta($sql);
    }
    public function anulado()
    {
        $sql = "SELECT condicion FROM consulta WHERE condicion = 'Anulado '";
        return ejecutarConsulta($sql);
    }

    /// funiones para los usuarios
    public function PendienteU()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE idusuario = '".$_SESSION['idusuarios']."' and tipo_estado = 'Pendiente'";
        return ejecutarConsulta($sql);
    }
    public function EnprocesoU()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE idusuario = '".$_SESSION['idusuarios']."' and tipo_estado = 'En Proceso'";
        return ejecutarConsulta($sql);
    }
    public function ConcluidoU()
    {
        $sql = "SELECT tipo_estado FROM consulta WHERE idusuario = '".$_SESSION['idusuarios']."' and tipo_estado = 'Ejecutado'";
        return ejecutarConsulta($sql);
    }
    public function AnuadoU()
    {
        $sql = "SELECT condicion FROM consulta WHERE idusuario = '".$_SESSION['idusuarios']."' and condicion = 'Anulado';";
        return ejecutarConsulta($sql);
    }
}