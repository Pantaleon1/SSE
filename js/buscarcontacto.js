var datoid = "";
var contacto = [];

function buscarId() {
    var id = document.querySelector('#buscar').value;//obtiene el valor de un elemento html y lo guarda en una variable
    datoid = id;
    if (id != "") {//se analiza si la varible esta vacia
        console.log("a");
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "../php/buscarContacto.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + datoid, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (contacto) {//en caso que todo se ejecuter correctamente se imprimiran los datos 
            //en el tbody de la tabla con el id tablajson del archivo tabla_prueba.php
            console.log(contacto+" soy response");
                var html;
                var i;
                for (i = 0; i < contacto.length; i++) {//se efectua un for para poder imprimir todos los datos en la tabla
                    html += "<tr>" +
                    "<td>" + contacto[i].id + "</td>" +
                    "<td>" + contacto[i].sexo + "</td>" +
                    "<td>" + contacto[i].entidad_federativa + "</td>" +
                    "<td>" + contacto[i].num_usuaria + "</td>" +
                    "<td>" + contacto[i].sexo + "</td>" +
                    "<td>" + contacto[i].loca_procedencia + "</td>" +
                    "<td>" + contacto[i].loca_radica + "</td>" +
                    "<td>" + contacto[i].telefono + "</td>" +
                    "<td>" + contacto[i].estad_civil+ "</td>" +
                    "<td>" + contacto[i].grado_estudio + "</td>" +
                    "<td>" + contacto[i].idioma + "</td>" +
                    "<td>" + contacto[i].grado_etnico + "</td>" +
                    "<td>" + contacto[i].ocupacion + "</td>" +
                    "<td>" + contacto[i].tipo_atencion + "</td>" +
                    "<td>" + contacto[i].hijos + "</td>" +
                    "<td>" + contacto[i].domicilio_actual + "</td>" +
                    "<td>" + contacto[i].per_ve_casa + "</td>" +
                    "<td>" + contacto[i].per_confianza + "</td>" +
                    "<td>" + contacto[i].domi_per + "</td>" +
                    "<td>" + contacto[i].telefono_per + "</td>" +
                    "<td>" + contacto[i].persona_canaliza + "</td>" +
                    "</tr>";
                }
                $('#tablajson tbody').html(html);//lugar en donde se imprimiran
            },
            error: function(jqXHR, textStatus, errorThrown)  {//mostrara un error si no hay conexion
                console.log('Error... '+jqXHR+" ||nuevo||  "+textStatus+" ||aaaaa|| "+errorThrown)
            }
        });
        inputVision();//funcion que sirve para mostrar un boton que sirve para imprimir la id buscada
    } else {
        tablacontacto();//en caso que no encuentre la id o este vacio el input se ejecuta esta funcion
    }
    valor();//funcion que asigna el valor del input con id buscar a otro oculto
}



function valor(){//funcion que asigna el valor del input con id buscar a otro oculto
    var id = document.querySelector('#buscar').value;
    document.querySelector('#valor').value = id;//asigna el valor del input con id buscar a este input
}

function inputVision(){//funcion que sirve para mostrar u ocultar un boton con id=imprimir
    //dependiendo de  si hay algo escrito en el input de id=buscar del documento tabla_prueba.php
    var id = document.querySelector('#buscar').value;
    if(id.length < 2 ){
        document.getElementById('imprimir').style.visibility = "hidden"; // hide
    }else if(id.length == 2 ){
        document.getElementById('imprimir').style.visibility = "visible";// show
}
}
function tablacontacto(){
    inputVision();
    console.log("b");
    var url = "../php/gen_contactoJSON.php"; //creacion de una variable
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function(contacto) { //metodo de obtencion de un documento json
        $.each(contacto, (i, contacto) => {
                var newRow = "<tr>" +
                "<td><center>" + contacto.id + "</center></td>" +
                "<td>" + contacto.entidad_federativa + "</td>" +
                "<td><center>" + contacto.num_usuaria + "</center></td>" +
                "<td>" + contacto.sexo + "</td>" +
                "<td>" + contacto.loca_procedencia + "</td>" +
                "<td>" + contacto.loca_radica + "</td>" +
                "<td>" + contacto.telefono + "</td>" +
                "<td>" + contacto.estad_civil+ "</td>" +
                "<td>" + contacto.grado_estudio + "</td>" +
                "<td>" + contacto.idioma + "</td>" +
                "<td>" + contacto.grado_etnico + "</td>" +
                "<td>" + contacto.ocupacion + "</td>" +
                "<td>" + contacto.tipo_atencion + "</td>" +
                "<td>" + contacto.hijos + "</td>" +
                "<td>" + contacto.domicilio_actual + "</td>" +
                "<td>" + contacto.per_ve_casa + "</td>" +
                "<td>" + contacto.per_confianza + "</td>" +
                "<td>" + contacto.domi_per + "</td>" +
                "<td>" + contacto.telefono_per + "</td>" +
                "<td>" + contacto.persona_canaliza + "</td>" +
                "</tr>";
                $(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun //su id
                
            });

    });
   }