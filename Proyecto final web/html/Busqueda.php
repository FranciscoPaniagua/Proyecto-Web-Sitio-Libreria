<!DOCTYPE html>
<html lang="esp" charset="UTF-8">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/Inicio.css">
	<script type="text/javascript">
function cambiar2(boton){
	var nombrebtn=boton.name;
 var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("todo").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","slider4.php?x="+nombrebtn,true);
 xhttp.send();
}
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
session_start();
$_SESSION['pos']=0;
$_SESSION['pos2']=0;
$_SESSION['pos3']=0;


?>
<div id="top">
	Librería	
	<?php
	if(isset($_SESSION['email'])){
		echo "<a href='Contenido.php'><button style='background-color: #86af49; color: #ffffff;'>Inicio</button></a>";
	}else{
		echo "<a href='Inicio.php'><button style='background-color: #86af49; color: #ffffff;'>Inicio</button></a>";
	}
	?>
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
$txt=$_GET['claves'];
$_SESSION['texto']=$txt;
$sql = "SELECT distinct li.isbn, li.titulo,li.idioma,li.anio,li.editorial,concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM) as autorN,g.nombre,
li.link, li.imagen from libros li, autor a, genero g, historial h where li.idAutor=a.idAutor and g.idGenero=li.idGenero
and (li.titulo like '%".$_SESSION['texto']."%' or concat(a.Nombre,' ',a.ApellidoP,' ',a.ApellidoM)  like '%".$_SESSION['texto']."%' or g.Nombre like '%".$_SESSION['texto']."%')";
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
	echo "<h1 align='left'>Resultados:</h1><a id='linkNombre' href='../html/Datos%20del%20libro.php' target='_blank'><h2 align='center' id='nombre2'>".$arregloTitulo[0]."</h2></a>
<button id='izq' onclick='cambiar2(this);' name='atras'>Atrás</button>
<a id='linkLibro' href='../html/Datos%20del%20libro.php' target='_blank'><img src='".$arregloImagen[0]."' alt='Imagen no disponible' id='slider' width='200px' height='250px' border='1px'></a>
<button id='der' onclick='cambiar2(this);' name='adelante'>Siguiente</button>
";




}else{
	 echo "0 results";
}
$conn->close();
?>

</div>
</body>
</html>