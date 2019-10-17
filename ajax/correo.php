<?php
include'../config/global.php';

$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);

mysqli_query($conexion, 'SET NAMES"'.DB_ENCODE.'"');

$query = $conexion->query("select US.nombre, US.area, US.email, CO.problema, CO.tipo_problema,CO.estado, CO.tipo_estado,date(CO.fecha_hora) as fecha,CO.condicion from
usuarios US join consulta CO
on US.idusuarios = CO.idusuario
where CO.tipo_estado ='Pendiente' and CO.condicion=''
order by CO.idconsulta desc
limit 1;");
while ($user = mysqli_fetch_array($query)) {
    $to = "marvinj.isd@gmail.com";
    $subject = "Nuevo requerimiento";
    $txt = '
<html> 
<head> 
   <title>Correo</title> 
</head> 
<body>
		<table border="1">
			<thead>
				<tr>
					<th>NOmbre</th>
                    <th>Area</th>
					<th>Email</th>
					<th>Problema</th>
					<th>Tipo Problema</th>
					<th>Estado</th>
					<th>T. estado</th>
					<th>Fecha</th>					
				</tr>
			</thead>
			<tbody>
					<tr>
						<td>'. $user['nombre'].'</td>
                        <td>'. $user['area'].'</td>
						<td>'. $user['email'].'</td>
						<td>'. $user['problema'].'</td>
						<td>'. $user['tipo_problema'].'</td>
						<td>'. $user['estado'].'</td>
						<td>'. $user['tipo_estado'].'</td>
						<td>'. $user['fecha'].'</td>				
					</tr>
				</tbody>
			</table>
</body> 
</html> 
';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .="Content-type: text/html; charset-utf8\r\n";
    $headers .= "From: HelpDesk<System@System.com>" . "\r\n" .
        "CC: marvinj.isd@gmail.com";

    if(mail($to,$subject,$txt,$headers))
    {
        echo "enviado";
    }
    else
    {
        echo "Error:<br>" . mysqli_error($query);
    }

} ?>