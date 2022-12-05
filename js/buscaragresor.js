var datoid = "";
var agresor = [];

function buscarId() {
    var id = document.querySelector('#buscar').value;//obtiene el valor de un elemento html y lo guarda en una variable
    datoid = id;
    if (id != "") {//se analiza si la varible esta vacia
        console.log("a");
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "../php/buscarAgresor.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + datoid, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (agresor) {//en caso que todo se ejecuter correctamente se imprimiran los datos 
            //en el tbody de la tabla con el id tablajson del archivo tabla_prueba.php
            console.log(agresor+" soy response");
                var html;
                var i;
                for (i = 0; i < agresor.length; i++) {//se efectua un for para poder imprimir todos los datos en la tabla
                    html += "<tr>" +
                    "<td>" + agresor[i].id + "</td>" +
                    "<td>" + agresor[i].nombre_completo + "</td>" +
                    "<td>" + agresor[i].edad + "</td>" +
                    "<td>" + agresor[i].sexo + "</td>" +
                    "<td>" + agresor[i].gra_estudio + "</td>" +
                    "<td>" + agresor[i].ocupacion + "</td>" +
                    "<td>" + agresor[i].ingre_mes + "</td>" +
                    "<td>" + agresor[i].adiccion + "</td>" +
                    "<td>" + agresor[i].vive_usuaria + "</td>" +
                    "<td>" + agresor[i].antecedentes + "</td>" +
                    "<td>" + agresor[i].tipo_violencias + "</td>" +
                    "<td>" + agresor[i].resena + "</td>" +
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
        tablaagresor();//en caso que no encuentre la id o este vacio el input se ejecuta esta funcion
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
function tablaagresor(){
    inputVision();
    console.log("b");
    var url = "../php/gen_agresorJSON.php"; //creacion de una variable
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function(agresor) { //metodo de obtencion de un documento json
        $.each(agresor, (i, agresor) => {
                var newRow = "<tr>" +
                    "<td><center>" + agresor.id + "</center></td>" +
                    "<td>" + agresor.nombre_completo + "</td>" +
                    "<td><center>" + agresor.edad + "</center></td>" +
                    "<td>" + agresor.sexo + "</td>" +
                    "<td>" + agresor.gra_estudio + "</td>" +
                    "<td>" + agresor.ocupacion + "</td>" +
                    "<td>" + agresor.ingre_mes + "</td>" +
                    "<td>" + agresor.adiccion + "</td>" +
                    "<td>" + agresor.vive_usuaria + "</td>" +
                    "<td>" + agresor.antecedentes + "</td>" +
                    "<td>" + agresor.tipo_violencias + "</td>" +
                    "<td>" + agresor.resena + "</td>" +
                    "</tr>";
                $(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun //su id
                
            });

    });
   }