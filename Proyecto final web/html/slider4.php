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


/*$nombre=$_GET["x"];

$pos=0;
if ($nombre=="atras") {
	$pos=$pos-1;
	if ($pos<0) {
			$pos=0;
		}	
}else{
	$pos=$pos+1;
	
}
*/
$sql = "SELECT distinct li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autorN,g.nombre,
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero
and (li.titulo like '%".$_SESSION['texto']."%' or concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM)  like '%".$_SESSION['texto']."%' or g.Nombre like '%".$_SESSION['texto']."%')";
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
	$_SESSION['pos']=$_SESSION['pos']-1;
	if ($_SESSION['pos']<0) {
			$_SESSION['pos']=$tamano-1;
		}
		$_SESSION['isbn']=$arregloIsbn[$_SESSION['pos']];	
}else{
	$_SESSION['pos']=$_SESSION['pos']+1;
	
	if ($_SESSION['pos']>=$tamano) {

		$_SESSION['pos']=0;
	
	}
	$_SESSION['isbn']=$arregloIsbn[$_SESSION['pos']];
}


echo "<h1 align='left'>Resultados:</h1><a id='linkNombre' href='../html/Datos%20del%20libro.php' target='_blank'><h2 align='center' id='nombre2'>".$arregloTitulo[$_SESSION['pos']]."</h2></a>
<button id='izq' onclick='cambiar2(this);'>Atrás</button>
<a id='linkLibro' href='../html/Datos%20del%20libro.php' target='_blank'><img src='".$arregloImagen[$_SESSION['pos']]."'  alt='Imagen no disponible' id='slider' width='200px' height='250px' border='1px'></a>
<button id='der' onclick='cambiar2(this);'>Siguiente</button>
";


}else{
	 echo "0 results";
}

$conn->close();
?>