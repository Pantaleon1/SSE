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
$agresor;
$id = $buscar;

$sql = "SELECT * FROM persona_violenta WHERE id LIKE '%" . $id . "%';"; //consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($conexion, $sql)) die(); //si los datos entre la coneccion y la consulta son correctos habra un resultado el cual se guardara en result
$agresor = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{  //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $id = $row['id'];
    $nombre_completo = $row['nombre_completo'];
    $edad = $row['edad'];
    $sexo = $row['sexo'];
    $gra_estudio = $row['gra_estudio'];
    $ocupacion = $row['ocupacion'];
    $ingre_mes = $row['ingre_mes'];
    $adiccion = $row['adiccion'];
    $vive_usuaria = $row['vive_usuaria'];
    $antecedentes = $row['antecedentes'];
    $tipo_violencias = $row['tipo_violencias'];
    $resena = $row['resena'];
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $agresor[] = array(
        'id' => $id,
        'nombre_completo' => $nombre_completo,
        'edad' => $edad,
        'sexo' => $sexo,
        'gra_estudio' => $gra_estudio,
        'ocupacion' => $ocupacion,
        'ingre_mes' => $ingre_mes,
        'adiccion' => $adiccion,
        'vive_usuaria' => $vive_usuaria,
        'antecedentes' => $antecedentes,
        'tipo_violencias' => $tipo_violencias,
        'resena' => $resena,
    );
}

//desconectamos la base de datos
$close = mysqli_close($conexion)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



$json_string = json_encode($agresor); //documento json que se usa para almacenar los datos del array
echo $json_string;


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Para ser responsivo las paginas-->
    <title>DATOS DEL AGRESOR</title>

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


<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,500;0,700;0,900;1,100&family=Roboto:wght@100;400&display=swap" rel="stylesheet">


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
                <h1 color="blue"> DATOS DEL AGRESOR </h1><br>
            </center>
        </div>

        <!-- Contenido -->
        <section class="table-responsive">
            <!-- Indica la creacion de una seccion en el documento -->
            <!--Para ser responsivo las paginas-->


            <?php foreach ($agresor as $perso) { ?>

                <h1>
                    <label>ID: <?php echo $perso['id']; ?></label></br></br>
                    <label>NOMBRE COMPLETO: <?php echo $perso['nombre_completo']; ?></label></br></br>
                    <label>EDAD: <?php echo $perso['edad']; ?></label></br></br>
                    <label>SEXO: <?php echo $perso['sexo']; ?></label></br></br>
                    <label>GRADO DE ESTUDIOS: <?php echo $perso['gra_estudio']; ?></label></br></br>
                    <label>OCUPACIÓN: <?php echo $perso['ocupacion']; ?></label></br></br>
                    <label>INGRESO MENSUAL: <?php echo $perso['ingre_mes']; ?></label></br></br>
                    <label>ADICCIÓN: <?php echo $perso['adiccion']; ?></label></br></br>
                    <label>VIVE LA USUARIA: <?php echo $perso['vive_usuaria']; ?></label></br></br>
                    <label>ANTECEDENTES: <?php echo $perso['antecedentes']; ?></label></br></br>
                    <label>TIPO DE VIOLENCIAS: <?php echo $perso['tipo_violencias']; ?></label></br></br>
                    <label>RESEÑA: <?php echo $perso['resena']; ?></label></br></br>
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