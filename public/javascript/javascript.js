var indicador = 1;
showDivs(indicador);

window.onload = function() {
	reiniciar();
}
function reiniciar() {
	indicador = 1;
	showDivs(1);
	v = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
	var val;
	for(i = 0; i < 5; i++) 
		v.splice(Math.floor(Math.random() * v.length), 1);

	mezclar(v);

    for(i = 0; i < 5; i++) 
        document.getElementById(i).src = "../images/slide/"+ v[i] +".jpg";
}
function plusDivs(n) {
	showDivs(indicador += n);
}
function showDivs(n) {
	var i;
	var x = document.getElementsByClassName("mySlides");
	if (n == x.length)
		document.getElementById('der').disabled = true;
	else
		document.getElementById('der').disabled = false;

	if (n == 1) 
		document.getElementById('izq').disabled = true;
	else
		document.getElementById('izq').disabled = false

	for (i = 0; i < x.length; i++)
		x[i].style.display = "none";

	x[indicador-1].style.display = "block"; 
}

function mezclar(v) {
  v.sort(() => Math.random() - 0.5);
}

    
function buscar(){
    var nombre = document.getElementById("juego").value;
	
    if (nombre == ""){
        document.getElementById("informacion").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML=this.responseText;
            }
        };
		
        xmlhttp.open("GET", "../controladores/buscar.php?nombre="+nombre, true);
        xmlhttp.send();
    }
}