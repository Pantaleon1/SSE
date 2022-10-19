var boton = document.getElementById('agregar');//variable de javascript
var guardar = document.getElementById('guardar');
var lista = document.getElementById("lista");
var data = [];//variable de tipo array
boton.addEventListener("click", agregar);//ejecutar la funcion
guardar.addEventListener("click", save);
var cant = 0;
function agregar() { //funcion
    var nombre = document.querySelector('#nombre').value;//valores de input
    var ubicacion = document.querySelector('#ubicacion').value;
    var mueble = document.querySelector('#mueble').value;
    var telefono = document.querySelector('#telefono').value;
    var pago_mes = document.querySelector('#pago_mes').value;
    var fecha = document.querySelector('#fecha').value;
    
    //agrega elementos al arreglo
    data.push(
        { "id": cant,
            "nombre": nombre,
            "ubicacion": ubicacion,
            "mueble": mueble,
            "telefono": telefono,
            "pago_mes": pago_mes,
            "fecha": fecha
            
        }
    );

    //convertir el arreglo a json
    // console.log(JSON.stringify(data));
    var id_row = 'row' + cant;
    var fila = '<tr id=' + id_row + 
    '><td>' + nombre + 
    '</td><td>' + ubicacion + 
    '</td><td>' + mueble + 
    '</td><td>' + telefono + 
    '</td><td>' + pago_mes + 
    '</td><td>' + fecha + 
     
    '</td>'+
    '<td><a href="#" class="btn btn-danger" onclick="eliminar(' + cant + ')";>Eliminar</a></td></tr>';
    //agregar fila a la tabla
    $("#lista").append(fila);
    $("#nombre").val('');
    $("#ubicacion").val('');
    $("#mueble").val('');
    $("#telefono").val('');
    $("#pago_mes").val('');
    $("#fecha").val('');
    
    $("#nombre").focus();
    cant++;
    sumar();
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
        console.log(x.id);
        if (x.id == row) {
            pos = i;
        }
        i++;
    }
    data.splice(pos, 1);
    sumar();
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
    sumar();//ejecucion de la funcion
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
        url: "registrar_datos_ge.php",//donde se ejecutara la sentencia
        data: "json=" + json,//datos que utilizara la sentencia
        success: function (respo) {
            location.reload();//si sale bien se recarga la pagina
        }

    });
}