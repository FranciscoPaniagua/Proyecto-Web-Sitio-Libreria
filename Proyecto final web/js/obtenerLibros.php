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

$sql = "SELECT li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autor,g.nombre,
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero
having (select count(h.Libros_ISBN))>=3";
$result = $conn->query($sql);
/*$pos=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {       
        $arregloUsuario[$pos]=$row["isbn"];
        $arregloCorreo[$pos]=$row["titulo"];
        $arregloCorreo[$pos]=$row["idioma"];
        $arregloCorreo[$pos]=$row["anio"];
        $arregloCorreo[$pos]=$row["editorial"];
        $arregloCorreo[$pos]=$row["autor"];
        $arregloCorreo[$pos]=$row["nombre"];
        $arregloCorreo[$pos]=$row[""];
        $pos++;
    }
  */
   $respuesta=array();
    $respuesta=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($respuesta);
?>