<?php

ob_start();

$server = "localhost:3307"; // variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sse";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass, $bd) //variable para la coneccion con la base de datos
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");

$buscar = $_POST["valor"]; //obtiene un valor de rBuscarMatricula.js
//generamos la consulta con el valor obtenido 
$registrar;
$id = $buscar;

$sql = "SELECT * FROM datos_usuaria WHERE id LIKE '%" . $id . "%';"; //consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($conexion, $sql)) die(); //si los datos entre la coneccion y la consulta son correctos habra un resultado el cual se guardara en result
$registrar = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{  //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $id = $row['id'];
    $nombre_municipio = $row['nombre_municipio'];
    $periodo = $row['periodo'];
    $nombre_atiende = $row['nombre_atiende'];
    $cargo_atiende = $row['cargo_atiende'];
    $tipo_servicio = $row['tipo_servicio'];
    $fecha = $row['fecha'];
    $sexo = $row['sexo'];
    $nombre = $row['nombre'];
    $edad = $row['edad'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $servicio_brindado = $row['servicio_brindado'];
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $registrar[] = array('id'=> $id, 
    'nombre_municipio'=> $nombre_municipio, 
    'periodo'=> $periodo, 
    'nombre_atiende'=> $nombre_atiende, 
    'cargo_atiende'=> $cargo_atiende, 
    'tipo_servicio'=> $tipo_servicio,
    'fecha'=> $fecha, 
    'sexo'=> $sexo, 
    'nombre'=> $nombre, 
    'edad'=> $edad, 
    'direccion'=> $direccion, 
    'telefono'=> $telefono, 
    'servicio_brindado'=> $servicio_brindado,
 );
}

//desconectamos la base de datos
$close = mysqli_close($conexion)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



$json_string = json_encode($registrar); //documento json que se usa para almacenar los datos del array
echo $json_string;


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Para ser responsivo las paginas-->
    <title>DATOS DE REGISTRO</title>

    <!-- Bootstrap 5 CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<style>
    body {
        font-size: 10px;
        font-family: 'Montserrat', sans-serif;
    }
</style>

<body class="m-0 vh-100 row justify-content-center align-items-center">
    <!-- Cabecera -->
    <div class="container col-auto">
        <div>
            <center>
                <h1 color="blue"> DATOS DE LA USUARIA</h1><br>
            </center>
        </div>

        <!-- Contenido -->
        <section class="table-responsive">
            <!-- Indica la creacion de una seccion en el documento -->
            <!--Para ser responsivo las paginas-->


            <?php foreach ($registrar as $perso) { ?>

                <h1>
                    <label>ID: <?php echo $perso['id']; ?></label></br></br>
                    <label>NOMBRE DEL MUNICIPIO: <?php echo $perso['nombre_municipio']; ?></label></br></br>
                    <label>PERIODO: <?php echo $perso['periodo']; ?></label></br></br>
                    <label>NOMBRE DEL PERSONAL: <?php echo $perso['nombre_atiende']; ?></label></br></br>
                    <label>CARGO DEL PERSONAL: <?php echo $perso['cargo_atiende']; ?></label></br></br>
                    <label>SERVICIO SOLICITADO: <?php echo $perso['tipo_servicio']; ?></label></br></br>
                    <label>FECHA: <?php echo $perso['fecha']; ?></label></br></br>
                    <label>SEXO: <?php echo $perso['sexo']; ?></label></br></br>
                    <label>NOMBRE: <?php echo $perso['nombre']; ?></label></br></br>
                    <label>EDAD: <?php echo $perso['edad']; ?></label></br></br>
                    <label>DIRECCION: <?php echo $perso['direccion']; ?></label></br></br>
                    <label>TELEFONO: <?php echo $perso['telefono']; ?></label></br></br>
                    <label>SERVICIO (S) BRINDADO: <?php echo $perso['servicio_brindado']; ?></label></br></br>

                </h1>
            <?php } ?>
        </section>

    </div>
</body>

</html>









<?php
$html = ob_get_clean();
//echo $html;

require_once '..\libreria\dompdf\autoload.inc.php'; //..libreria\dompdf\autoload.inc.php
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true)); //para imagenes
$dompdf->setOptions($options);

$dompdf->loadHtml($html); //guarda el archivo html o un mensaje

$dompdf->setPaper('letter');
// $dompdf->setPaper('A4', 'landscape');


$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>