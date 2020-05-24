<!DOCTYPE html>
<html>
<head>
	<title>Datos del libro</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	 <LINK REL=StyleSheet HREF="../css/estiloDatosDelLib.css" TYPE="text/css" MEDIA=screen>
     <script type="text/javascript" src="../js/Inicio.js"></script>
</head>
<body>
<div id="Lib">Librería
</div>
<br><br>
    <form id="formBus" action="Busqueda.php">
        <input class="txtBuscar" type="text" name="claves" placeholder="Viento del este, viento del oeste" required="Ingrese texto"><input class="btnBus" type="submit" name="btnBuscar" value="Buscar">
    </form>

<br>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "libreria";

//Líneas de Test

//$ruta=$_GET["x"];
// Create connection
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT  li.isbn, li.titulo,li.idioma,li.idAutor,li.idGenero,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autor,g.nombre,
li.link, li.imagen from libros li, autor a, genero g where li.idAutor=a.idAutor and g.idGenero=li.idGenero and li.isbn='".$_SESSION['isbn2']."'";
$result = $conn->query($sql);
$pos1=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloIsbn[$pos1]=$row["isbn"];
    	$arregloTitulo[$pos1]=$row["titulo"];
    	$arregloIdioma[$pos1]=$row["idioma"];
    	$arregloAnio[$pos1]=$row["anio"];
    	$arregloEditorial[$pos1]=$row["editorial"];
    	$arregloAutor[$pos1]=$row["autor"];
    	$arregloGenero[$pos1]=$row["nombre"];
    	$arregloLink[$pos1]=$row["link"];
    	$arregloImagen[$pos1]=$row["imagen"];
    	 $arregloIdAutor[$pos1]=$row["idAutor"];
        $arregloIdGenero[$pos1]=$row["idGenero"];

    	$pos1++;
	}
        $sql1 = "INSERT INTO historial values ('".$_SESSION['email']."','".$arregloIsbn[0]."',".$arregloIdAutor[0].
        ",".$arregloIdGenero[0].","
        .'"2018-07-11"'.")";

if (mysqli_query($conn, $sql1)) {
 } else {
 

}
	echo "<img class='imgViento' src='".$arregloImagen[0]."'>";
    echo "<h1>".$arregloTitulo[0]."</h1>";
    echo "<br>";
    echo "<label id='Autor'>".$arregloAutor[0]."</label>";
    echo "<label id='Gen'>Género</label>";
    echo "<label id='Genero'>".$arregloGenero[0]."</label>";
    echo "<label id='Ed'>Editorial</label>";
    echo "<label id='Editorial'>".$arregloEditorial[0]."</label>";
    echo "<label id='Aed'> Año de edición</label>";
    echo "<label  id='AnioEdici'>".$arregloAnio[0]."</label>";
    echo "<label id='ISB'>ISBN</label>";
    echo "<br>";
    echo "<a href='".$arregloLink[0]."' target='_blank'><button id='btnVer'>Ver</button></a>";
    echo "<label id='ISBN'>".$arregloIsbn[0]."</label>";
    echo "<label id='Idiom'>Idioma</label>";
    echo "<label id='Idioma'>".$arregloIdioma[0]."</label>";
  }else{
     echo "0 results";
}
$conn->close();
?>


</body>
</html>