var datoid = "";
var registrar = [];

function buscarId() {
    var id = document.querySelector('#buscar').value;//obtiene el valor de un elemento html y lo guarda en una variable
    datoid = id;
    if (id != "") {//se analiza si la varible esta vacia
        console.log("a");
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "../php/buscarRegistrar.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + datoid, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (registrar) {//en caso que todo se ejecuter correctamente se imprimiran los datos 
            //en el tbody de la tabla con el id tablajson del archivo tabla_prueba.php
            console.log(registrar+" soy response");
                var html;
                var i;
                for (i = 0; i < registrar.length; i++) {//se efectua un for para poder imprimir todos los datos en la tabla
                    html += "<tr>" +
                    "<td>" + registrar[i].id + "</td>" +
                "<td>" + registrar[i].nombre_municipio + "</td>" +
                "<td>" + registrar[i].periodo + "</td>" +
                "<td>" + registrar[i].nombre_atiende + "</td>" +
                "<td>" + registrar[i].cargo_atiende + "</td>" +
                "<td>" + registrar[i].tipo_servicio + "</td>" +
                "<td>" + registrar[i].fecha + "</td>" +
                "<td>" + registrar[i].sexo + "</td>" +
                "<td>" + registrar[i].nombre + "</td>" +
                "<td>" + registrar[i].edad + "</td>" +
                "<td>" + registrar[i].direccion + "</td>" +
                "<td>" + registrar[i].telefono + "</td>" +
                "<td>" + registrar[i].servicio_brindado + "</td>" +
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
        tablaregistrar();//en caso que no encuentre la id o este vacio el input se ejecuta esta funcion
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
function tablaregistrar(){
    inputVision();
    console.log("b");
    var url = "../php/gen_registroJSON.php"; //creacion de una variable
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function(registrar) { //metodo de obtencion de un documento json
        $.each(registrar, (i, registrar) => {
                var newRow = "<tr>" +
                "<td><center>" + registrar.id + "</center></td>" +
                "<td>" + registrar.nombre_municipio + "</td>" +
                "<td><center>" + registrar.periodo + "</center></td>" +
                "<td>" + registrar.nombre_atiende + "</td>" +
                "<td>" + registrar.cargo_atiende + "</td>" +
                "<td>" + registrar.tipo_servicio + "</td>" +
                "<td>" + registrar.fecha + "</td>" +
                "<td>" + registrar.sexo + "</td>" +
                "<td>" + registrar.nombre + "</td>" +
                "<td>" + registrar.edad + "</td>" +
                "<td>" + registrar.direccion + "</td>" +
                "<td>" + registrar.telefono + "</td>" +
                "<td>" + registrar.servicio_brindado + "</td>" +
                "</tr>";
                $(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun //su id
                
            });

    });
   }