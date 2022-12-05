var datoid = "";
var reporte = [];

function buscarId() {
    var id = document.querySelector('#buscar').value;//obtiene el valor de un elemento html y lo guarda en una variable
    datoid = id;
    if (id != "") {//se analiza si la varible esta vacia
        console.log("a");
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "../php/buscarreporte.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + datoid, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (reporte) {//en caso que todo se ejecuter correctamente se imprimiran los datos 
            //en el tbody de la tabla con el id tablajson del archivo tabla_prueba.php
            console.log(reporte+" soy response");
                var html;
                var i;
                for (i = 0; i < reporte.length; i++) {//se efectua un for para poder imprimir todos los datos en la tabla
                    html += "<tr>" +
                    "<td>" + reporte[i].id + "</td>" +
                    "<td>" + reporte[i].entidad_federal + "</td>" +
                    "<td>" + reporte[i].municipio + "</td>" +
                    "<td>" + reporte[i].responsable + "</td>" +
                    "<td>" + reporte[i].person_report + "</td>" +
                    "<td>" + reporte[i].sexo + "</td>" +
                    "<td>" + reporte[i].edad + "</td>" +
                    "<td>" + reporte[i].local_radica + "</td>" +
                    "<td>" + reporte[i].telefono + "</td>" +
                    "<td>" + reporte[i].domicilio + "</td>" +
                    "<td>" + reporte[i].grado_estu + "</td>" +
                    "<td>" + reporte[i].idioma + "</td>" +
                    "<td>" + reporte[i].grupo_etnico + "</td>" +
                    "<td>" + reporte[i].ocupacion + "</td>" +
                    "<td>" + reporte[i].parentesco + "</td>" +
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
        tablareporte();//en caso que no encuentre la id o este vacio el input se ejecuta esta funcion
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
function tablareporte(){
    inputVision();
    console.log("b");
    var url = "../php/gen_reporteJSON.php"; //creacion de una variable
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function(reporte) { //metodo de obtencion de un documento json
        $.each(reporte, (i, reporte) => {
                var newRow = "<tr>" +
                "<td>" + reporte.id + "</td>" +
							"<td>" + reporte.entidad_federal + "</td>" +
							"<td>" + reporte.municipio + "</td>" +
							"<td>" + reporte.responsable + "</td>" +
							"<td>" + reporte.person_report + "</td>" +
							"<td>" + reporte.sexo + "</td>" +
							"<td>" + reporte.edad + "</td>" +
							"<td>" + reporte.local_radica + "</td>" +
							"<td>" + reporte.telefono + "</td>" +
							"<td>" + reporte.domicilio + "</td>" +
							"<td>" + reporte.grado_estu + "</td>" +
							"<td>" + reporte.idioma + "</td>" +
							"<td>" + reporte.grupo_etnico + "</td>" +
							"<td>" + reporte.ocupacion + "</td>" +
							"<td>" + reporte.parentesco + "</td>" +
							"</tr>";
                $(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun //su id
                
            });

    });
   }