<?php
include'conexion.php';
$datos = $conn->query("SELECT * FROM `servidor` WHERE 1 ORDER BY id_ser DESC LIMIT 1");
while ($user = mysqli_fetch_array($datos)) {
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
					<th>Fecha</th>
                                        <th>Hora</th>
					<th>Nombre y Apellido</th>
					<th>Empresa</th>
					<th>Lugar</th>
					<th>Area</th>
					<th>T. Problema</th>
					<th>Detalle del Problema</th>
                                        <th>Estatus</th>					
				</tr>
			</thead>
			<tbody>
					<tr>
						<td>'. $user['fecha'].'</td>
                        <td>'. DATE("h:ia", STRTOTIME($user['hora'])).'</td>
						<td>'. $user['nombre'].'</td>
						<td>'. $user['empresa'].'</td>
						<td>'. $user['lugar'].'</td>
						<td>'. $user['area'].'</td>
						<td>'. $user['problema'].'</td>
						<td>'. $user['urgencia'].'</td>
                                                <td>'. $user['estado'].'</td>				
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
        header('location: formulari.php');
    }
    else
    {
        echo "Error:<br>" . mysqli_error($conn);
    }
} ?>