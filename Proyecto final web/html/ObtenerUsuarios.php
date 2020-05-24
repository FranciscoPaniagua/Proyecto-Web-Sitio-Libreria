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

$sql = "SELECT email,usuario FROM usuarios";
$result = $conn->query($sql);
$pos=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {       
        $arregloUsuario[$pos]=$row["usuario"];
        $arregloCorreo[$pos]=$row["email"];
        $pos++;
    }
  
   for ($i=0; $i <sizeof($arregloUsuario) ; $i++) { 
       if($_GET['radio']=="elim".$i){
        $sql2 = "DELETE FROM usuarios WHERE email='".$_GET['correo'.$i]."'";
        $result = $conn->query($sql2);
        if (!$result){
             header("Location:UsuariosAdmin.php");
    exit();
        }
        else{
            header("Location:UsuariosAdmin.php");
    exit();
        }
       }elseif ($_GET['radio']=="mod".$i) {
         $sql3 = "UPDATE usuarios SET usuario='".$_GET['usuario'.$i]."', email='".$_GET['correo'.$i]."' WHERE email='".$_GET['correo'.$i]."'";
         $result = $conn->query($sql3);
        if (!$result){
            die ('ERROR AL MODIFICAR EL REGISTRO'. mysql_error());
              header("Location:UsuariosAdmin.php");
    exit();
        }
        else{
            echo "MODIFICACION EXITOSA";
              header("Location:UsuariosAdmin.php");
                 exit();
        }
       }
   }
}
?>