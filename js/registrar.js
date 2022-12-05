var boton = document.getElementById('agregar');//variable de javascript
var guardar = document.getElementById('guardar');
var lista = document.getElementById("lista");
var data = [];//variable de tipo array
boton.addEventListener("click", agregar);//ejecutar la funcion
guardar.addEventListener("click", save);
var cant = 0;
function agregar() { //funcion
    var id = document.querySelector('#id').value;//valores de input
    var nombre_municipio = document.querySelector('#nombre_municipio').value;//valores de input
    var periodo = document.querySelector('#periodo').value;
    var nombre_atiende = document.querySelector('#nombre_atiende').value;
    var cargo_atiende = document.querySelector('#cargo_atiende').value;
    var tipo_servicio = document.querySelector('#tipo_servicio').value;
    var fecha = document.querySelector('#fecha').value;
    var sexo = document.querySelector('#sexo').value;
    var nombre = document.querySelector('#nombre').value;
    var edad = document.querySelector('#edad').value;
    var direccion = document.querySelector('#direccion').value;
    var telefono = document.querySelector('#telefono').value;
    var servicio_brindado = document.querySelector('#servicio_brindado').value;
    //agrega elementos al arreglo
    data.push(
        { 
        "id": cant,
            "id": id,
            "nombre_municipio": nombre_municipio,
            "periodo": periodo,
            "nombre_atiende": nombre_atiende,
            "cargo_atiende": cargo_atiende,
            "tipo_servicio": tipo_servicio,
            "fecha": fecha,
            "sexo": sexo,
            "nombre": nombre,
            "edad": edad,
            "direccion": direccion,
            "telefono": telefono,
            "servicio_brindado": servicio_brindado
            
            
        }
    );

    //convertir el arreglo a json
    // console.log(JSON.stringify(data));
    var id_row = 'row' + cant;
    var fila = '<tr id=' + id_row + 
    '><td>' + id +
    '</td><td>' + nombre_municipio +  
    '</td><td>' + periodo + 
    '</td><td>' + nombre_atiende + 
    '</td><td>' + cargo_atiende + 
    '</td><td>' + tipo_servicio + 
    '</td><td>' + fecha + 
    '</td><td>' + sexo +
    '</td><td>' + nombre +
    '</td><td>' + edad +
    '</td><td>' + direccion +
    '</td><td>' + telefono +
    '</td><td>' + servicio_brindado +
     
    '</td>'+
    '<td><a href="#" class="btn btn-danger" onclick="eliminar(' + cant + ')";>Eliminar</a></td></tr>';
    //agregar fila a la tabla
    $("#lista").append(fila);
    $("#id").val('');
    $("#nombre_municipio").val('');
    $("#periodo").val('');
    $("#nombre_atiende").val('');
    $("#cargo_atiende").val('');
    $("#tipo_servicio").val('');
    $("#fecha").val('');
    $("#sexo").val('');
    $("#nombre").val('');
    $("#edad").val('');
    $("#direccion").val('');
    $("#telefono").val('');
    $("#servicio_brindado").val('');
    
    $("#nombre").focus();
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
        url: "registrar.php",//donde se ejecutara la sentencia
        data: "json=" + json,//datos que utilizara la sentencia
        
        success: function (respo) {
            
            document.querySelector('#nombre_municipio').value = "";
            document.querySelector('#periodo').value = "";
            document.querySelector('#nombre_atiende').value = "";
            document.querySelector('#cargo_atiende').value = "";
            document.querySelector('#tipo_servicio').value = "";
            document.querySelector('#fecha').value = "";
            document.querySelector('#sexo').value = "";
            document.querySelector('#nombre').value = "";
            document.querySelector('#edad').value = "";
            document.querySelector('#direccion').value = "";
            document.querySelector('#telefono').value = "";
            document.querySelector('#servicio_brindado').value = "";
            
            alert("Guardado exitosamente");
            location.reload();//si sale bien se recarga la pagina
        }

    
    });
    console.error();
}