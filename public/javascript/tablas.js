function buscarUsuarios(){
        if(window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("tablas").innerHTML=this.responseText;
            }
        };
		alert("Buscando... Solo un momento");
        xmlhttp.open("GET", "/PracticaExamen/public/controladores/tablaUsuario.php", true);
        xmlhttp.send();
    
}

function buscarJuego(){	
    if(window.XMLHttpRequest){
        //code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("tablas").innerHTML=this.responseText;
        }
    };
    alert("Buscando... Solo un momento");
    xmlhttp.open("GET", "/PracticaExamen/public/controladores/tablaJuego.php", true);
    xmlhttp.send();
}

function buscarMensaje(){
        if(window.XMLHttpRequest){
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("tablas").innerHTML=this.responseText;
            }
        };
		alert("Buscando... Solo un momento");
        xmlhttp.open("GET", "/PracticaExamen/public/controladores/tablaCorreo.php", true);
        xmlhttp.send();
}