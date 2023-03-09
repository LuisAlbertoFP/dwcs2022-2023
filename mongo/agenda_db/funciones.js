window.onload = function() {
    
    var eliminar = function() {
        var id_contacto = this.getAttribute("id_contacto");
       // alert(id_contacto);

        var xhr1 = new XMLHttpRequest();
        xhr1.open('DELETE', "eliminar_contacto.php", true);
        xhr1.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr1.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    dostuff = this.responseText;
                    //alert(dostuff);
                    var fila = document.getElementById('Contacto'+id_contacto);
                    var padre  = fila.parentNode;
                    padre.removeChild(fila);
                };//end onreadystate
        };
        xhr1.send(JSON.stringify({
            "id_contacto": id_contacto
        }));
        
    }

    var eliminarReal = function() {
        if (this.id != "btModalEliminar") {
            alert("Error en llamada")
            return
        }
        var id_contacto = this.getAttribute("id_contacto");
            var xhr1 = new XMLHttpRequest();
            xhr1.open('POST', "index.php", true);
            xhr1.onreadystatechange = function() {
                    if (this.status == 200 && this.readyState == 4) {
                        datosRespuesta = this.responseText;
                        var respuesta = JSON.parse(datosRespuesta)
                        if (respuesta.OK  == id_contacto) {
                            var fila = document.getElementById('Contacto'+id_contacto);
                            var padre  = fila.parentNode;
                            padre.removeChild(fila);
                        }
                    //  alert(datosRespuesta);
                        
                    };//end onreadystate
            };
            var data = new FormData();
            data.append('eliminar', 'eliminar');
            data.append('id_contacto', id_contacto);
            xhr1.send(data);
    }


    var eliminar2 = function() {
        var nombre = this.parentNode.parentNode.getElementsByClassName("nombre");
        var apellidos = this.parentNode.parentNode.getElementsByClassName("apellidos");
        var textoModal = document.getElementById("textoEliminar")
        textoModal.innerText  = "Desea eliminar el contacto "+nombre[0].innerText+", "+apellidos[0].innerText+"?"
        var btModalEliminar = document.getElementById("btModalEliminar")
        var id_contacto = this.getAttribute("id_contacto")
        btModalEliminar.setAttribute("id_contacto",id_contacto)
        
    }
  

    var btModalEliminar = document.getElementById("btModalEliminar")
    btModalEliminar.addEventListener('click', eliminarReal, false);
    
    var btsEliminar = document.getElementsByClassName('eliminar');
    Array.from(btsEliminar).forEach(element => {
        element.addEventListener('click', eliminar2, false);
    });



    function mostrarContactoModificado(contacto,html) {
        var trContacto = document.getElementById("Contacto"+contacto.id_contacto)
        if (!trContacto) {
            var tablaContactoBody = document.getElementById('TablaContactoBody');
            trContacto = document.createElement('tr');                        
            tablaContactoBody.appendChild(trContacto);
        }
        trContacto.innerHtml="";
        trContacto.outerHTML = html;
        //Modificamos los botones
        //Cargamos el nuevo elemento del DOM con sus datos actualizados
        trContacto = document.getElementById("Contacto"+contacto.id_contacto)

        var btModificar = trContacto.getElementsByClassName('bt_modificar');
        Array.from(btModificar).forEach(element2 => {
            element2.addEventListener('click', modificar, false);
        });
        

        var btEliminar = trContacto.getElementsByClassName('eliminar');
        Array.from(btEliminar).forEach(element => {
            element.addEventListener('click', eliminar2, false);
        });

       
    }


    var guardar = function() {
        var form = document.getElementById('formGuardar');
       // alert(id_contacto);

        var xhr1 = new XMLHttpRequest();
        xhr1.open('POST', "index.php", true);
        var datosFormulario = new FormData(form);
        xhr1.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                    datosRespuesta = this.responseText;
                    var respuesta = JSON.parse(datosRespuesta)
                    if (respuesta.OK != null ) {
                        form.reset();
                        mostrarContactoModificado(respuesta.OK,respuesta.html)
                        var btCerrarModalGuardar = document.getElementById('btCerrarModalGuardar');
                        btCerrarModalGuardar.click();
                        // alert(datosRespuesta);
                        //var fila = document.getElementById('Contacto'+id_contacto);
                        //var padre  = fila.parentNode;
                        //padre.removeChild(fila);
                    }
                  //  alert(datosRespuesta);
                    
                };//end onreadystate
        };
        
        datosFormulario.append('js', true);
        var btGuardar = document.getElementById("Guardar");
        var id_contacto = btGuardar.getAttribute("id_contacto")
        if (id_contacto != null) {
            datosFormulario.append("contacto[id_contacto]", id_contacto);
        }
        xhr1.send(datosFormulario);
        btGuardar.removeAttribute("id_contacto")
    }



    var modificar = function() {
    //  alert("accion modificar");
      var id_contacto = this.getAttribute("id_contacto");
      var trContacto = document.getElementById("Contacto"+id_contacto)
      var btGuardar = document.getElementById("Guardar");
      var form = document.getElementById("formGuardar");
      var camposForm = form.getElementsByTagName("input");
      Array.from(camposForm).forEach(campo => {
        var nombreCampo =campo.getAttribute("Id");
        campo.value =  trContacto.getElementsByClassName(nombreCampo)[0].innerHTML
      })
      btGuardar.setAttribute("id_contacto",id_contacto); 

    }



    var btGuardar = document.getElementById('Guardar');
    btGuardar.addEventListener('click',guardar,false);
  
    var btsModificar = document.getElementsByClassName('bt_modificar');
    Array.from(btsModificar).forEach(element => {
        element.addEventListener('click', modificar, false);
    });
    
}