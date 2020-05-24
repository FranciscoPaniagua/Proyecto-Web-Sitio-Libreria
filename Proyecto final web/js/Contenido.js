
/*var imagenes=['../img/analista.jpg','../img/diario.jpg','../img/labuenatierra.jpg','../img/pabellon.jpg',
'../img/peonia.jpg'];

var nombres=['El Psicoanalista','El diario de Ana Frank','La Buena Tierra','Pabellon','Peonia'];

var links=['../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html'];

var pos=0;

function izq(){
	var slider=document.getElementById('slider');
	var nombre=document.getElementById('nombre');
	var link=document.getElementById('linkLibro');
	var linkNombre=document.getElementById('linkNombre');
	pos--;
	if (pos<0) {
		pos=imagenes.length-1;
	}
	slider.src=imagenes[pos];
	nombre.innerHTML=nombres[pos];
	link.href=links[pos];
	linkNombre.href=links[pos];
}

function der(){
	var slider=document.getElementById('slider');
	var nombre=document.getElementById('nombre');
	var link=document.getElementById('linkLibro');
	var linkNombre=document.getElementById('linkNombre');
	pos++;
	if(pos>=imagenes.length){
		pos=0;
	}
	slider.src=imagenes[pos];
	nombre.innerHTML=nombres[pos];
	link.href=links[pos];
	linkNombre.href=links[pos];
}

//Volver a leer

var imagenes=['../img/analista.jpg','../img/diario.jpg','../img/html.jpg','../img/pabellon.jpg',
'../img/peonia.jpg'];

var nombres=['El Psicoanalista','El diario de Ana Frank','HTML','Pabellon','Peonia'];

var links=['../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html'];

var pos2=0;

function izq2(){
	var slider=document.getElementById('slider2');
	var nombre=document.getElementById('nombre2');
	var link=document.getElementById('linkLibro2');
	var linkNombre=document.getElementById('linkNombre2');
	pos2--;
	if (pos2<0) {
		pos2=imagenes.length-1;
	}
	slider.src=imagenes[pos2];
	nombre.innerHTML=nombres[pos2];
	link.href=links[pos2];
	linkNombre.href=links[pos2];
}

function der2(){
	var slider=document.getElementById('slider2');
	var nombre=document.getElementById('nombre2');
	var link=document.getElementById('linkLibro2');
	var linkNombre=document.getElementById('linkNombre2');
	pos2++;
	if(pos2>=imagenes.length){
		pos2=0;
	}
	slider.src=imagenes[pos2];
	nombre.innerHTML=nombres[pos2];
	link.href=links[pos2];
	linkNombre.href=links[pos2];
}
// Lo más leído:
var imagenes=['../img/analista.jpg','../img/diario.jpg','../img/html.jpg','../img/hornos.jpg',
'../img/peonia.jpg'];

var nombres=['El Psicoanalista','El diario de Ana Frank','HTML','Los hornos de Hitler','Peonia'];

var links=['../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html','../html/Datos%20del%20libro.html'];

var pos3=0;

function izq3(){
	var slider=document.getElementById('slider3');
	var nombre=document.getElementById('nombre3');
	var link=document.getElementById('linkLibro3');
	var linkNombre=document.getElementById('linkNombre3');
	pos3--;
	if (pos3<0) {
		pos3=imagenes.length-1;
	}
	slider.src=imagenes[pos3];
	nombre.innerHTML=nombres[pos3];
	link.href=links[pos3];
	linkNombre.href=links[pos3];
}

function der3(){
	var slider=document.getElementById('slider3');
	var nombre=document.getElementById('nombre3');
	var link=document.getElementById('linkLibro3');
	var linkNombre=document.getElementById('linkNombre3');
	pos3++;
	if(pos3>=imagenes.length){
		pos3=0;
	}
	slider.src=imagenes[pos3];
	nombre.innerHTML=nombres[pos3];
	link.href=links[pos3];
	linkNombre.href=links[pos3];
}
*/

function cambiar(boton){
	var nombrebtn=boton.name;
 var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("lo_mas_leido").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","Slider.php?x="+nombrebtn,true);
 xhttp.send();
}



function cambiar2(boton){	
	var nombre=boton.name;
	var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("volver_a_leer").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","Slider2.php?x="+nombre,true);
 xhttp.send(); 
}


function cambiar3(boton){	
	var nombre=boton.name;
	var xhttp=new XMLHttpRequest();
 xhttp.onreadystatechange=function(){
 	if (this.readyState==4&&this.status==200) {
 		document.getElementById("sugerencias").innerHTML=this.responseText;
 	}
 };
 xhttp.open("GET","Slider3.php?x="+nombre,true);
 xhttp.send(); 
}



