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

$limite=0;
$boton=$_GET["x"];
if ($boton=="izq") {
    $limite=$limite-10;
    if ($limite<0) {
        $limite=0;
    }
}else{
    $limite=$limite+10;
}
$sql = "SELECT email,usuario FROM usuarios limit 10 offset ".$limite;
$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    //echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    	$arregloUsuario[$pos]=$row["usuario"];
    	$arregloCorreo[$pos]=$row["email"];
    	$pos++;
	}
    //echo "</table>";
	 $posUsuario=0;
     $filas="";
     $filas=$filas."<th>Nombre</th>
        <th>Correo</th>
        <th>Editar</th>
        <th>Eliminar</th>";
	for ($i=0; $i <sizeof($arregloUsuario) ; $i++) { 		
		$filas=$filas."<tr><td><center><input type='text' name='usuario".$posUsuario."' value='".$arregloUsuario[$posUsuario]."'></center></td>				
		<td><center><input type='text' name='correo".$posUsuario."' value='".$arregloCorreo[$posUsuario]."'></center></td>
		<td><center><input type='radio' name='radio' value='mod".$posUsuario."'/></center></td>
 		<td><center><input type='radio' name='radio' value='elim".$posUsuario."'/></center></td></tr>
		";
		$posUsuario++;
	}

    echo $filas;

} else {
    echo "0 results";
}
$conn->close();
?>