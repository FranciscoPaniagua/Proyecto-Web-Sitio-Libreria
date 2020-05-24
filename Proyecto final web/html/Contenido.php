
<!DOCTYPE html>
<html>
<head lang="esp" charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/Contenido.css">
	<script type="text/javascript" src="../js/Contenido.js"></script>
		 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
session_start();
$_SESSION['pos']=0;
$_SESSION['pos2']=0;
$_SESSION['pos3']=0;
?>
<div  id="top">
	Librería
	<img src="../img/user.png" alt="Imágen no disponible." id="imgUser">
		<a href="Perfil.php" target="blank"><button id="btnPerfil">Perfil</button></a>
</div>
<br>
<div>
	<form action="Busqueda.php">
		<input type="textbox" name="claves" id="barrabusq" placeholder="Palabras Clave" required="Debe ingresar palabras clave para su búsqueda"><input type="submit" name="btnBuscar" value="Buscar" id="btnBuscar">
	</form>
</div>
<br>
<!-- style="border-style:solid;border-width:1px; -->
<div id="sugerencias" align="center">

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

$sql = "SELECT  distinct li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autor,g.nombre,
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero 
and (li.idGenero in(select h1.Libros_idGenero from historial h1 where h1.Usuarios_email='".$_SESSION['email']."') 
or 
li.idAutor in (select h1.Libros_idAutor from historial h1 where h1.Usuarios_email='".$_SESSION['email']."'))";
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
	$_SESSION['isbn3']=$arregloIsbn[0];
		echo "<h1 align='left'>Sugerencias:</h1><a id='linkNombre' href='../html/Datos%20del%20libro3.php' target='_blank'><h2 align='center' id='nombre2'>".$arregloTitulo[0]."</h2></a>
<button id='izq' onclick='cambiar3(this);' name='atras'>Atrás</button>
<a id='linkLibro' href='../html/Datos%20del%20libro3.php' target='_blank'><img src='".$arregloImagen[0]."' alt='Imagen no disponible' id='slider' width='200px' height='250px' border='1px'></a>
<button id='der' onclick='cambiar3(this);' name='adelante'>Siguiente</button>
";


$t=sizeof($arregloIsbn);

}else{
	 echo "0 results";
}
$conn->close();
?>	
</div>
<hr>
<br>

<div id="volver_a_leer" align="center">
	<h1 align="left">Volver a leer:</h1>

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
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero  and li.ISBN=h.Libros_isbn and
h.Usuarios_email='".$_SESSION['email']."'";
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
	$_SESSION['isbn2']=$arregloIsbn[0];
	echo "<a id='linkNombre2' href='../html/Datos%20del%20libro2.php' target='blank'><h2 align='center' id='nombre2'>".$arregloTitulo[0]."</h2></a>
	<button id='izq2' name='atras' onclick='cambiar2(this);'>Atrás</button>
<a id='linkLibro2' href='../html/Datos%20del%20libro2.php' target='blank'><img src='".$arregloImagen[0]."' alt='Imagen no disponible' id='slider2' width='200px' height='250px' border='1px'></a>
<button id='der2' name='adelante' onclick='cambiar2(this);'>Siguiente</button>";


$t=sizeof($arregloIsbn);

}else{
	 echo "0 results";
}
$conn->close();
?>	
</div>

<hr>
<br>
<div id="lo_mas_leido" align="center">				
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
	echo "<h1 align='left'>Lo más leído:</h1><a id='linkNombre' href='../html/Datos%20del%20libro.php' target='blank'><h2 align='center' id='nombre2'>".$arregloTitulo[0]."</h2></a>
<button id='izq' onclick='cambiar(this);' name='atras'>Atrás</button>
<a id='linkLibro' href='../html/Datos%20del%20libro.php' target='blank'><img src='".$arregloImagen[0]."' alt='Imagen no disponible' id='slider' width='200px' height='250px' border='1px'></a>
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