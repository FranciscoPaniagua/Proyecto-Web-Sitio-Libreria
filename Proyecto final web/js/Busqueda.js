function cambiar4(boton){
	alert("Entra");
	var nombrebtn=boton.name;
 var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("res").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","slider4.php?x="+nombrebtn,true);
 xhttp.send();
}
