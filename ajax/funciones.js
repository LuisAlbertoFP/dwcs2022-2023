function peticionServidor() {
    const req = new XMLHttpRequest();
    req.onload = (e) => {
        if (req.status == 200) { 
            const datos = req.responseText;
            var contendor =  document.getElementById("contendor");
            //alert(datos);
            const obj = JSON.parse(datos);
            contendor.innerHTML += "Nombre: "+obj.nombre+" Apellidos: "+obj.apellidos;
        } else {
            alert("Error petición");
        }
    }

    //req.open("POST","datos.php",true);
    var data = new FormData();
    data.append("nombre","Luis");
    data.append("apellidos","Fernández");
    //req.send(data);

    req.open("GET","datos.php?nombre=Pepa&apellidos=Otero",true);
    req.send();
}