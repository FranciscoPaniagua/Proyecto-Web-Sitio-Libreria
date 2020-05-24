<?php
session_start();
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


$sql = "SELECT  distinct li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autor,g.nombre,
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero 
and (li.idGenero in(select h1.Libros_idGenero from historial h1 where h1.Usuarios_email='".$_SESSION['email']."') or li.idAutor in (select h1.Libros_idAutor from historial h1 where h1.Usuarios_email='".$_SESSION['email']."'))";
$result = $conn->query($sql);
$pos1=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloTitulo[$pos1]=$row["titulo"];
    	$arregloImagen[$pos1]=$row["imagen"];
    	$arregloIsbn[$pos1]=$row["isbn"];
    	$pos1++;
	}
$nombre=$_GET["x"];
$tamano=sizeof($arregloTitulo);
$pos=0;
if ($nombre=="atras") {
	$_SESSION['pos3']=$_SESSION['pos3']-1;
	if ($_SESSION['pos3']<0) {
			$_SESSION['pos3']=$tamano-1;
		}
		$_SESSION['isbn3']=$arregloIsbn[$_SESSION['pos3']];	
}else{
	$_SESSION['pos3']=$_SESSION['pos3']+1;
	
	if ($_SESSION['pos3']>=$tamano) {

		$_SESSION['pos3']=0;
	
	}
	$_SESSION['isbn3']=$arregloIsbn[$_SESSION['pos3']];

}

echo "<h1 align='left'>Sugerencias:</h1><a id='linkNombre2' href='../html/Datos%20del%20libro3.php' target='_blank'><h2 align='center' id='nombre2'>".$arregloTitulo[$_SESSION['pos3']]."</h2></a>
	<button id='izq2' name='atras' onclick='cambiar3(this);'>Atrás</button>
<a id='linkLibro2' href='../html/Datos%20del%20libro3.php' target='_blank'><img src='".$arregloImagen[$_SESSION['pos3']]."' alt='Imagen no disponible' id='slider2' width='200px' height='250px' border='1px'></a>
<button id='der2' name='adelante' onclick='cambiar3(this);'>Siguiente</button>";

}else{
	 echo "0 results";
}

$conn->close();
?>