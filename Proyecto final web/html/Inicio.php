<!DOCTYPE html>
<html lang="esp" charset="UTF-8">
<html>
<head>
	<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="../css/Inicio.css">
		<script type="text/javascript" src="../js/Inicio.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
session_start();
$_SESSION['pos']=0;
$_SESSION['pos2']=0;
$_SESSION['pos3']=0;

$_SESSION['email']=null;
?>
<div id="top">
	Librería	
		<img src="../img/user.png" alt="Imágen no disponible." id="imgUser">	
		<a href="AccesoCorreo.html"><button id="btnPerfil">Acceder</button></a>	

</div>
<br>
<div>
	<form action="Busqueda.php">
		<input type="textbox" name="claves" id="barrabusq" placeholder="Palabras Clave" required="Ingrese texto"><input type="submit" name="btnBuscar" value="Buscar" id="btnBuscar">
	</form>
</div>
<br>
<br>
<br>
<br>
<div align="center" id="todo">  
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

$sql = "SELECT  li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autor,g.nombre,
li.link, li.imagen from libros li, autor a, genero g where li.idAutor=a.idAutor and g.idGenero=li.idGenero 
having (select count(h1.Libros_isbn) from historial h1 where h1.Libros_ISBN=li.ISBN)>=3";
$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloTitulo[$pos]=$row["titulo"];
    	$arregloImagen[$pos]=$row["imagen"];
    	$arregloIsbn[$pos]=$row["isbn"];
    	$pos++;
	}

//$arreglada=$arregloImagen[0];
//$arreglada=str_replace(' ', '%20', $arreglada);
//$arreglada="../img/diario.jpg";
//echo $arreglada."<br>";
	$_SESSION['isbn']=$arregloIsbn[0];
	echo "<h1 align='left'>Lo más leído:</h1><a id='linkNombre' href='../html/Datos%20del%20libro.php' target='_blank'><label id='nombre' target='blank' style='text-decoration:none;cursor:pointer;'>".$arregloTitulo[0]."</label></a>
<br>
<br>
<br>
<br>
<button id='izq' onclick='cambiar(this);' name='atras'>Atrás</button>
<a id='linkLibro' href='../html/Datos%20del%20libro.php' target='_blank'><img src='".$arregloImagen[0]."' alt='Imagen no disponible' id='slider' width='200px' height='250px' border='1px'></a>
<button id='der' onclick='cambiar(this);' name='adelante'>Siguiente</button>
";




}else{
	 echo "0 results";
}
$conn->close();
?>

</div>
</body>
</html>