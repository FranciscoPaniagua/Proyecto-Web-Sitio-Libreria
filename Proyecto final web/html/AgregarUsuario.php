<!DOCTYPE html>
<html>
<head>
	<title>Agregar</title>
		<link rel="stylesheet" type="text/css" href="../css/AgUsuario.css">
</head>
<body>
		<h1>Agregar nuevo usuario</h1>
	<div class="Image" align="center"><img class="Image1" src="../img/user.png"></div><br/>
	<form id="form1" method="post">
	
		<label id="texto1">Usuario:</label><input id="input1" type="textbox" name="User" required="Ingrese texto"><br><br>
		<label id="texto2">Contraseña:</label><input id="input2" type="password" name="pass1" required="Ingrese texto"><br><br>
		<label id="texto3">Conf. contraseña:</label><input id="input3" type="password" name="pass2"required="Ingrese texto"><br><br>
		<label id="texto4">e-mail:</label><input id="input4" type="textbox" name="correo" required="Ingrese texto"><br><br>
		<input id="boton" type="submit" name="Agregar" value="Agregar">
	</form>
	<br>
	<form action="UsuariosAdmin.php" align="center"><input id="formVolver" type="submit" value="Volver"></form>
<br>
<br>
	<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "libreria";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$usuario=$_POST['User'];
$password=$_POST['pass1'];
$email=$_POST['correo'];
$passwordC=$_POST['pass2'];
if($password==$passwordC){
	$sql = "INSERT INTO usuarios (email, usuario, password)
VALUES ('$email', '$usuario', '$password')";

if (mysqli_query($conn, $sql)) {
echo '<script type="text/javascript">;';
echo "alert('Usuario agregado corrrectamente!')";
echo "</script>;";
} else {
	
	  echo '<script type="text/javascript">;';
	echo "alert('No se pudo agregar el usuario, correo ya utlizado por otro usuario.')";
	echo "</script>;";
  


}
}else{
	  echo '<script type="text/javascript">;';
	echo "alert('Las contraseñas no coinciden.')";
	echo "</script>;";

}

mysqli_close($conn);

?>

</body>
</html>