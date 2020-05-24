<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	 <LINK REL=StyleSheet HREF="../css/estiloRegistro.css" TYPE="text/css" MEDIA=screen>

</head>
<body>
<div class="titulo">Librería</div>
<div class="Image" align="center"><img class="Image1" src="../img/user.png"></div><br/>
<div id="divForm">
	<form id="form1" method="get" >
	<label class="texto1">Usuario:</label><input class="input1" type="text" name="usuario">
	<br>
	<br>
	<label class="texto2">Contraseña:</label><input class="input2" type="password" name="password">
	<br>
	<br>
	<label class="texto3">Conf. contraseña:</label><input class="input3" type="password" name="password2">
	<br>
	<br>
	<label class="texto4">e-mail:</label><input class="input4" type="e-mail" name="e-mail">
	<br>
	<br>
	<input class="boton" type="submit" name="Registro" value="Registrar">
	</form>
</div>

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
$usuario=$_GET['usuario'];
$password=$_GET['password'];
$email=$_GET['e-mail'];
$passwordC=$_GET['password2'];
if($password==$passwordC){
	$sql = "INSERT INTO usuarios (email, usuario, password)
VALUES ('$email', '$usuario', '$password')";

if (mysqli_query($conn, $sql)) {
	header("Location:Inicio.html");
	exit();
    echo "New record created successfully";
} else {
	echo "<p>Error: correo no válido.</p>";
	header("Location:Registro.html");
	exit();


}
}else{
	echo "Error: las contraseñas no coinciden.";
	header("Location:Registro.html");
	exit();

}

mysqli_close($conn);
?>

</body>
</html>