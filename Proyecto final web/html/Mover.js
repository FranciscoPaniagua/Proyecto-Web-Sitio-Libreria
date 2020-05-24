function mover(boton){
	var nombrebtn=boton.name;
 var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("tabla").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","Mover.php?x="+nombrebtn,true);
 xhttp.send();
}