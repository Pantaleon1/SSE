var boton = document.getElementById('agregar');//variable de javascript
var guardar = document.getElementById('guardar');
var lista = document.getElementById("lista");
var data = [];//variable de tipo array
boton.addEventListener("click", agregar);//ejecutar la funcion
guardar.addEventListener("click", save);
var cant = 0;
function agregar() { //funcion
    var id = document.querySelector('#id').value;//valores de input
    var nombre_completo = document.querySelector('#nombre_completo').value;//valores de input
    var edad = document.querySelector('#edad').value;
    var sexo = document.querySelector('#sexo').value;
    var gra_estudio = document.querySelector('#gra_estudio').value;
    var ocupacion = document.querySelector('#ocupacion').value;
    var ingre_mes = document.querySelector('#ingre_mes').value;
    var adiccion = document.querySelector('#adiccion').value;
    var vive_usuaria = document.querySelector('#vive_usuaria').value;   
    var antecedentes = document.querySelector('#antecedentes').value;
    var tipo_violencias = document.querySelector('#tipo_violencias').value;
    var resena = document.querySelector('#resena').value;
    //agrega elementos al arreglo
    data.push(
        { 
        "id": cant,
        "id": id,
        "nombre_completo": nombre_completo, 
        "edad": edad,
        "sexo": sexo,
        "gra_estudio": gra_estudio,
        "ocupacion": ocupacion,
        "ingre_mes": ingre_mes,
        "adiccion": adiccion,
        "vive_usuaria": vive_usuaria,
        "antecedentes": antecedentes,
        "tipo_violencias": tipo_violencias,
        "resena": resena
            
            
        }
    );

    //convertir el arreglo a json
    // console.log(JSON.stringify(data));
    var id_row = 'row' + cant;
    var fila = '<tr id=' + id_row + 
    '><td>' + id +
    '</td><td>' + nombre_completo +  
    '</td><td>' + edad + 
    '</td><td>' + sexo + 
    '</td><td>' + gra_estudio +
    '</td><td>' + ocupacion +
    '</td><td>' + ingre_mes +
    '</td><td>' + adiccion +
    '</td><td>' + vive_usuaria +
    '</td><td>' + antecedentes +
    '</td><td>' + tipo_violencias +
    '</td><td>' + resena +
    
     
    '</td>'+
    '<td><a href="#" class="btn btn-danger" onclick="eliminar(' + cant + ')";>Eliminar</a></td></tr>';
    //agregar fila a la tabla
    $("#lista").append(fila);
    $("#id").val('');
    $("#nombre_completo").val('');
    $("#edad").val('');
    $("#sexo").val('');
    $("#gra_estudio").val('');
    $("#ocupacion").val('');
    $("#ingre_mes").val('');
    $("#adiccion").val('');
    $("#vive_usuaria").val('');
    $("#antecedentes").val('');
    $("#tipo_violencias").val('');
    $("#resena").val('');
    
    $("#nombre_completo").focus();
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
        url: "agresor.php",//donde se ejecutara la sentencia
        data: "json=" + json,//datos que utilizara la sentencia
        success: function (respo) {
            document.querySelector('#nombre_completo').value = "";
            document.querySelector('#edad').value = "";
            document.querySelector('#sexo').value = "";
            document.querySelector('#gra_estudio').value = "";
            document.querySelector('#ocupacion').value = "";
            document.querySelector('#ingre_mes').value = "";
            document.querySelector('#adiccion').value = "";
            document.querySelector('#vive_usuaria').value = "";
            document.querySelector('#antecedentes').value = "";
            document.querySelector('#tipo_violencias').value = "";
            document.querySelector('#resena').value = "";
            
            alert("Guardado exitosamente");

            location.reload();//si sale bien se recarga la pagina
        }

    });
    console.error();
}