var boton = document.getElementById('agregar');//variable de javascript
var guardar = document.getElementById('guardar');
var lista = document.getElementById("lista");
var data = [];//variable de tipo array
boton.addEventListener("click", agregar);//ejecutar la funcion
guardar.addEventListener("click", save);
var cant = 0;
function agregar() { //funcion
    var id = document.querySelector('#id').value;//valores de input
    var entidad_federal = document.querySelector('#entidad_federal').value;//valores de input
    var municipio = document.querySelector('#municipio').value;
    var responsable = document.querySelector('#responsable').value;
    var person_report = document.querySelector('#person_report').value;
    var sexo = document.querySelector('#sexo').value;
    var edad = document.querySelector('#edad').value;
    var local_radica = document.querySelector('#local_radica').value;
    var telefono = document.querySelector('#telefono').value;
    var domicilio = document.querySelector('#domicilio').value;
    var grado_estu = document.querySelector('#grado_estu').value;
    var idioma = document.querySelector('#idioma').value;
    var grupo_etnico = document.querySelector('#grupo_etnico').value;
    var ocupacion = document.querySelector('#ocupacion').value;
    var parentesco = document.querySelector('#parentesco').value;
    
    //agrega elementos al arreglo
    data.push(
        { 
        "id": cant,
        "id": id,
        "entidad_federal": entidad_federal, 
        "municipio": municipio,
        "responsable": responsable,
        "person_report": person_report,
        "sexo": sexo,
        "edad": edad,
        "local_radica": local_radica,
        "telefono": telefono,
        "domicilio": domicilio,
        "grado_estu": grado_estu,
        "idioma": idioma,
        "grupo_etnico": grupo_etnico,
        "ocupacion": ocupacion,
        "parentesco": parentesco
            
            
        }
    );

    //convertir el arreglo a json
    // console.log(JSON.stringify(data));
    var id_row = 'row' + cant;
    var fila = '<tr id=' + id_row + 
    '><td>' + id +
    '</td><td>' + entidad_federal +  
    '</td><td>' + municipio + 
    '</td><td>' + responsable + 
    '</td><td>' + person_report + 
    '</td><td>' + sexo + 
    '</td><td>' + edad + 
    '</td><td>' + local_radica +
    '</td><td>' + telefono +
    '</td><td>' + domicilio +
    '</td><td>' + grado_estu +
    '</td><td>' + idioma +
    '</td><td>' + grupo_etnico +
    '</td><td>' + ocupacion +
    '</td><td>' + parentesco +

    
     
    '</td>'+
    '<td><a href="#" class="btn btn-danger" onclick="eliminar(' + cant + ')";>Eliminar</a></td></tr>';
    //agregar fila a la tabla
    $("#lista").append(fila);
    $("#id").val('');
    $("#entidad_federal").val('');
    $("#municipio").val('');
    $("#responsable").val('');
    $("#person_report").val('');
    $("#sexo").val('');
    $("#edad").val('');
    $("#local_radica").val('');
    $("#telefono").val('');
    $("#domicilio").val('');
    $("#grado_estu").val('');
    $("#idioma").val('');
    $("#grupo_etnico").val('');
    $("#ocupacion").val('');
    $("#parentesco").val('');

    
    $("#person_report").focus();
    cant++;
   
}

function eliminar(row) {
    //remueve la fila de la tabla html
    $("#row" + row).remove();
    //remover el elmento del arreglo
    //data.splice(row,1);
    //buscar el id a eliminar
    var i = 0;
    var pos = -1;
    for (x of data) {
        
        if (x.id == row) {
            pos = i;
        }
        i++;
    }
    data.splice(pos, 1);
    
}
function cantidad(row) {
    var canti = parseInt(prompt("nuevo cantidad"));
    data[row].cantidad = canti;
    data[row].total = data[row].cantidad * data[row].precio;
    var filaid = document.getElementById("row" + row);
    celda = filaid.getElementsByTagName('td');
    celda[2].innerHTML = canti;
    celda[3].innerHTML = data[row].total;
    console.log(data);
    //ejecucion de la funcion
}
// function sumar() {
//     let tot = 0;
//     for (x of data) {
//         tot = tot + x.total;
//     }
//     document.querySelector("#total").innerHTML = "Total " + tot;
// }

function save() {
    var json = JSON.stringify(data);
    $.ajax({
        
        type: "POST",//sentencia de tipo post
        url: "reporte.php",//donde se ejecutara la sentencia
        data: "json=" + json,//datos que utilizara la sentencia

        success: function (respo) {
            document.querySelector('#entidad_federal').value = "";
            document.querySelector('#municipio').value = "";
            document.querySelector('#responsable').value = "";
            document.querySelector('#person_report').value = "";
            document.querySelector('#sexo').value = "";
            document.querySelector('#edad').value = "";
            document.querySelector('#local_radica').value = "";
            document.querySelector('#telefono').value = "";
            document.querySelector('#domicilio').value = "";
            document.querySelector('#grado_estu').value = "";
            document.querySelector('#idioma').value = "";
            document.querySelector('#grupo_etnico').value = "";
            document.querySelector('#ocupacion').value = "";
            document.querySelector('#parentesco').value = "";
            
            alert("Guardado exitosamente");
            location.reload();//si sale bien se recarga la pagina
        }

    });
    console.error();
}