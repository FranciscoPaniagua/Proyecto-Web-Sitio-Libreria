
<!DOCTYPE html>
<html>
<head>
	<title>Mi perfil</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	 <LINK REL=StyleSheet HREF="../css/estiloPerfil.css" TYPE="text/css" MEDIA=screen>
</head>
<body>
	<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "libreria";
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT usuario,password FROM usuarios where email='".$_SESSION['email']."'";
	$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloPass[$pos]=$row["password"];
    	$arregloUs[$pos]=$row["usuario"];
    	$pos++;
	}
    //echo "</table>";
    $_SESSION['pass']=$arregloPass[0];
    $_SESSION['user']=$arregloUs[0];
} else {
    echo "0 results";
}
	
$conn->close();
	?>
<div id="perfil">Mi perfil</div>
<br>
<div id="Image" align="center"><img class="imagen1" src="../img/user.png"></div>
<br>
<form id="form1" action="ModificarPerfil.php" method="get">
	<label class="label1"> Usuario:</label>
	<?php
	echo '<input class="input1" type="text" name="Usuario" value="'.$arregloUs[0].'">';
	?>
	<br><br>
	<label class="label2"> Cambiar contraseña:</label><input class="input2" type="password" name="password1" placeholder="Ingresar contraseña actual"><br><br>
	<label class="label3"> Nueva contraseña:</label><input class="input3" type="password" name="password2"><br><br>
	<label class="label4"> Confirmar contraseña:</label><input class="input4" type="password" name="password4"><br><br>
	<input type="submit" name="guardar" class="btnguardar" value="Guardar Cambios">
</form>
<br>
<form action="Contenido.php" method="get" id="form2">
	<input type="submit" name="volver" value="volver" style="margin-left:792px;">
</form>

<form action="Inicio.php" method="get" id="form2">
	<input type="submit" name="Salir" value="Salir" id="btnSalir" style="margin-left:792px; width: 52px; top:900px; left: 100px;" >
</form>
</body>
</html>