<!DOCTYPE html>
<html lang="esp">
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/VentanaAdmin.css">
	<!--<script type="text/javascript" src="../js/Inicio.js"></script>-->
</head>
<body>
<div id="top">
	Usuarios
</div>
<br>
<br>
<br>
<div align="center">
		<form action="busquedaUsuarios.php">
	<input  type="text" name="busqueda" style="width: 600px;">
	<input  type="submit" name="btnBuscar" value="Buscar" >
</form>
<form action="UsuariosAdmin.php">
	<input type="submit" name="btnTodo" value="Mostrar Todo" style="background-color: #b5e7a0;">
</form>
</div>

<br>
<form id="agregar" action="AgregarUsuario.html" align="center"><input id="botonAgregar" type="submit" value="Agregar"></form>
<br>
<br>
<div align="center">
<form method="get" action="ObtenerUsuarios.php" name="Usuarios">
	<center><table id="tabla">
		<th>Nombre</th>
		<th>Correo</th>
		<th>Editar</th>
		<th>Eliminar</th>
		<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "libreria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$ingresado=$_GET['busqueda'];
$sql = "SELECT email,usuario FROM usuarios where email like '$ingresado%' or usuario like '$ingresado%'";
$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloUsuario[$pos]=$row["usuario"];
    	$arregloCorreo[$pos]=$row["email"];
    	$pos++;
	}
    //echo "</table>";
	 $posUsuario=0;
	for ($i=0; $i <sizeof($arregloUsuario) ; $i++) { 		
		echo "<tr><td><center><input type='text' name='usuario".$posUsuario."' value='".$arregloUsuario[$posUsuario]."'></center></td>				
		<td><center><input type='text' name='correo".$posUsuario."' value='".$arregloCorreo[$posUsuario]."'></center></td>
		<td><center><input type='radio' name='radio' value='mod".$posUsuario."'/></center></td>
 		<td><center><input type='radio' name='radio' value='elim".$posUsuario."'/></center></td></tr>
		";
		$posUsuario++;
	}

} else {
    echo "0 results";
}
$conn->close();
?>

	</table></center>
	<input type='submit' value='Ejecuta'></form>
</form>
</div>

</body>
</html>