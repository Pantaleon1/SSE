var boton = document.getElementById('agregar');//variable de javascript
var guardar = document.getElementById('guardar');
var lista = document.getElementById("lista");
var data = [];//variable de tipo array
boton.addEventListener("click", agregar);//ejecutar la funcion
guardar.addEventListener("click", save);
var cant = 0;
function agregar() { //funcion
    var id = document.querySelector('#id').value;//valores de input
    var entidad_federativa = document.querySelector('#entidad_federativa').value;//valores de input
    var nom_usuaria = document.querySelector('#nom_usuaria').value;
    var sexo = document.querySelector('#sexo').value;
    var loca_procedencia = document.querySelector('#loca_procedencia').value;
    var loca_radica = document.querySelector('#loca_radica').value;
    var telefono = document.querySelector('#telefono').value;
    var estad_civil = document.querySelector('#estad_civil').value;
    var grado_estudio = document.querySelector('#grado_estudio').value;
    var idioma = document.querySelector('#idioma').value;
    var grado_etnico = document.querySelector('#grado_etnico').value;
    var ocupacion = document.querySelector('#ocupacion').value;
    var tipo_atencion = document.querySelector('#tipo_atencion').value;
    var hijos = document.querySelector('#hijos').value;
    var domicilio_actual = document.querySelector('#domicilio_actual').value;
    var per_vi_casa = document.querySelector('#per_vi_casa').value;
    var per_confianza = document.querySelector('#per_confianza').value;
    var domi_per = document.querySelector('#domi_per').value;
    var telefono_per = document.querySelector('#telefono_per').value;
    var persona_canaliza = document.querySelector('#persona_canaliza').value;
    //agrega elementos al arreglo
    data.push(
        { 
        "id": cant,
        "id": id,
        "entidad_federativa": entidad_federativa, 
        "nom_usuaria": nom_usuaria,
        "sexo": sexo,
        "loca_procedencia": loca_procedencia,
        "loca_radica": loca_radica,
        "telefono": telefono,
        "estad_civil": estad_civil,
        "grado_estudio": grado_estudio,
        "idioma": idioma,
        "grado_etnico": grado_etnico,
        "ocupacion": ocupacion,
        "tipo_atencion": tipo_atencion,
        "hijos": hijos,
        "domicilio_actual": domicilio_actual,
        "per_vi_casa": per_vi_casa,
        "per_confianza": per_confianza,
        "domi_per": domi_per,
        "telefono_per": telefono_per,
        "persona_canaliza": persona_canaliza
            
            
        }
    );

    //convertir el arreglo a json
    // console.log(JSON.stringify(data));
    var id_row = 'row' + cant;
    var fila = '<tr id=' + id_row + 
    '><td>' + id +
    '</td><td>' + entidad_federativa +  
    '</td><td>' + nom_usuaria + 
    '</td><td>' + sexo + 
    '</td><td>' + loca_procedencia + 
    '</td><td>' + loca_radica + 
    '</td><td>' + telefono + 
    '</td><td>' + estad_civil +
    '</td><td>' + grado_estudio +
    '</td><td>' + idioma +
    '</td><td>' + grado_etnico +
    '</td><td>' + ocupacion +
    '</td><td>' + tipo_atencion +
    '</td><td>' + hijos +
    '</td><td>' + domicilio_actual +
    '</td><td>' + per_vi_casa +
    '</td><td>' + per_confianza +
    '</td><td>' + domi_per +
    '</td><td>' + telefono_per +
    '</td><td>' + persona_canaliza +
    
     
    '</td>'+
    '<td><a href="#" class="btn btn-danger" onclick="eliminar(' + cant + ')";>Eliminar</a></td></tr>';
    //agregar fila a la tabla
    $("#lista").append(fila);
    $("#id").val('');
    $("#entidad_federativa").val('');
    $("#nom_usuaria").val('');
    $("#sexo").val('');
    $("#loca_procedencia").val('');
    $("#loca_radica").val('');
    $("#telefono").val('');
    $("#estad_civil").val('');
    $("#grado_estudio").val('');
    $("#idioma").val('');
    $("#grado_etnico").val('');
    $("#ocupacion").val('');
    $("#tipo_atencion").val('');
    $("#hijos").val('');
    $("#domicilio_actual").val('');
    $("#per_vi_casa").val('');
    $("#per_confianza").val('');
    $("#domi_per").val('');
    $("#telefono_per").val('');
    $("#persona_canaliza").val('');
    
    $("#nom_usuaria").focus();
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
        url: "contacto.php",//donde se ejecutara la sentencia
        data: "json=" + json,//datos que utilizara la sentencia
        success: function (respo) {
            document.querySelector('#entidad_federativa').value = "";
            document.querySelector('#nom_usuaria').value = "";
            document.querySelector('#sexo').value = "";
            document.querySelector('#loca_procedencia').value = "";
            document.querySelector('#loca_radica').value = "";
            document.querySelector('#telefono').value = "";
            document.querySelector('#estad_civil').value = "";
            document.querySelector('#grado_estudio').value = "";
            document.querySelector('#idioma').value = "";
            document.querySelector('#grado_etnico').value = "";
            document.querySelector('#ocupacion').value = "";
            document.querySelector('#tipo_atencion').value = "";
            document.querySelector('#hijos').value = "";
            document.querySelector('#domicilio_actual').value = "";
            document.querySelector('#per_vi_casa').value = "";
            document.querySelector('#per_confianza').value = "";
            document.querySelector('#domi_per').value = "";
            document.querySelector('#telefono_per').value = "";
            document.querySelector('#persona_canaliza').value = "";
            
            alert("Guardado exitosamente");


            location.reload();//si sale bien se recarga la pagina
        }

    });
    console.error();
}