<!DOCTYPE html>
<html lang="esp" charset="UTF-8">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/AccesoCorreo.css">
</head>
<body>
<div id="top">
	Librería
</div>
<div id="img" align="center">
<img src="../img/user.png" alt="Imágen no disponible">
</div>
<br>
<div id="form">
<form  method="get">
<label class="texto">E-Mail:</label><input type="textbox" name="e-mail" placeholder="ejemplo@dominio.com">
<br>
<br>
<br>
<label class>Contraseña:</label><input type="textbox" name="contrasena" placeholder="contraseña" class="texto1">
<br>
<br>
<input type="submit" name="acceder" class="submit" value="Acceder">
</form>
</div>
<br>
<br>
<div id="crear" align="center">
	<a href="Registro.html" class="link" target="blank">Crear cuenta</a>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "libreria";
$_SESSION['mensaje']="";
$passwordu=$_GET['contrasena'];
$email=$_GET['e-mail'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
session_start();
$_SESSION['email']=null;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT email,password FROM usuarios";
$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloPass[$pos]=$row["password"];
    	$arregloCorreo[$pos]=$row["email"];
    	$pos++;
	}
    //echo "</table>";
} else {
    echo "0 results";
}

$contC=0;
$existeC=false;
foreach ($arregloCorreo as $correo) {
   $contC+=1;
 if($correo==$email){
    $existeC=true;
    break;
 }
  
}
$contP=0;
$existeP=false;
foreach ($arregloPass as $pass) {
 $contP+=1;
 if($pass==$passwordu&&$contP==$contC){
    $existeP=true;
    break;
 }
    
}

if($existeC==true&&$existeP==true&&$contP==$contC){
 
 $_SESSION['email']=$email;
 echo " ".$_SESSION['email'];
    header("Location:Contenido.php");
   
    exit();
 
    //echo "Acceso correcto";
}else{
       // header("Location:AccesoCorreo.html");
}
//Admin
$sql = "SELECT email,password FROM administradores";
$result = $conn->query($sql);
$pos=0;

if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
        $arregloPass1[$pos]=$row["password"];
        $arregloCorreo1[$pos]=$row["email"];
        $pos++;
    }
    //echo "</table>";
} else {
    echo "0 results";
}

$contC=0;
$existeC=false;
foreach ($arregloCorreo1 as $correo) {
  $contC+=1;
 if($correo==$email){
    $existeC=true;
    break;
 }
   
}
$contP=0;
$existeP=false;
foreach ($arregloPass1 as $pass) {
$contP+=1;
 if($pass==$passwordu&&$contP==$contC){
    $existeP=true;
    break;
 }
     
}
if($existeC==true&&$existeP==true&&$contP==$contC){
  header("Location:UsuariosAdmin.php");
  exit();
    echo "".$contP;
    echo "Acceso correcto";
}else{
      // header("Location:AccesoCorreo.html");
}
$conn->close();
?>
</body>
</html>

