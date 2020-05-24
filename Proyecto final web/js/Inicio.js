/*var imagenes=['../img/analista.1jpg','../img/diario.jpg','../img/hornos.jpg'];
var nombres=['El Psicoanalista','El diario de Ana Frank','Los hornos de Hitler'];
var links=['../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html'];*/
/*window.onload=carga;

function carga(){
	var arreglo;
	 var xmlhttp = new XMLHttpRequest();
	http.onreadystatechange=function(){
		if (this.readyState==4&&this.status==200) {
		arreglo=JSON.parse(this.responseText);

		}
	};
	http.open("GET","obtenerLibros.php",true);
	http.send();
	var slider=document.getElementById('slider');
	var nombre=document.getElementById('nombre');
	var link=document.getElementById('linkLibro');
	var linkNombre=document.getElementById('linkNombre');
	//pos--;
	//if (pos<0) {
	//	pos=Object.keys(arreglo).length-1;
	//}
	for(var x in arreglo){
		slider.src=arreglo[x].imagen;
	nombre.innerHTML=arreglo[x].titulo;
	
	}
	
	
	link.href='../html/Datos%20del%20libro.html';
	linkNombre.href='../html/Datos%20del%20libro.html';
}


function izq(){
	var pos=0;
	alert("Hola");
	var arreglo;
	 var xmlhttp = new XMLHttpRequest();
	http.onreadystatechange=function(){
		if (this.readyState==4&&this.status==200) {
		arreglo=JSON.parse(this.responseText);

		}
	};
	http.open("GET","obtenerLibros.php",true);
	http.send();
	var slider=document.getElementById('slider');
	var nombre=document.getElementById('nombre');
	var link=document.getElementById('linkLibro');
	var linkNombre=document.getElementById('linkNombre');
	//pos--;
	//if (pos<0) {
	//	pos=Object.keys(arreglo).length-1;
	//}
	for(x in arreglo){
		slider.src=arreglo[x].imagen;
	nombre.innerHTML=arreglo[x].titulo;
	
	}
	
	
	link.href='../html/Datos%20del%20libro.html';
	linkNombre.href='../html/Datos%20del%20libro.html';
}



function der(){
var pos=0;
	var arreglo;
	var http2= new XMLHttpRequest();
	http.onreadystatechange=function(){
		if (this.readyState==4&&this.status==200) {
			//arreglo=JSON.parse(this.responseText);
			
		}
	};
	http2.open("GET","obtenerLibros.php",true);
	http2.send();

	var slider=document.getElementById('slider');
	var nombre=document.getElementById('nombre');
	var link=document.getElementById('linkLibro');
	var linkNombre=document.getElementById('linkNombre');
	pos++;
	if(pos>=Object.keys(arreglo).length){
		pos=0;
	}

	for(x in arreglo){
		slider.src=arreglo[x].imagen;
	nombre.innerHTML=arreglo[x].titulo;	
	}
	
	link.href='../html/Datos%20del%20libro.html';
	linkNombre.href='../html/Datos%20del%20libro.html';
}*/

function cambiar(boton){
	var nombrebtn=boton.name;
 var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("todo").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","Slider.php?x="+nombrebtn,true);
 xhttp.send();
}


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