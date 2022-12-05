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
$contacto;
$id = $buscar;

$sql = "SELECT * FROM primer_contacto WHERE id LIKE '%" . $id . "%';"; //consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($conexion, $sql)) die(); //si los datos entre la coneccion y la consulta son correctos habra un resultado el cual se guardara en result
$contacto = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{  //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $id = $row['id'];
    $entidad_federativa = $row['entidad_federativa'];
    $nom_usuaria = $row['nom_usuaria'];
    $sexo = $row['sexo'];
    $loca_procedencia = $row['loca_procedencia'];
    $loca_radica = $row['loca_radica'];
    $telefono = $row['telefono'];
    $estad_civil = $row['estad_civil'];
    $grado_estudio = $row['grado_estudio'];
    $idioma = $row['idioma'];
    $grado_etnico = $row['grado_etnico'];
    $ocupacion = $row['ocupacion'];
    $tipo_atencion = $row['tipo_atencion'];
    $hijos = $row['hijos'];
    $domicilio_actual = $row['domicilio_actual'];
    $per_vi_casa = $row['per_vi_casa'];
    $per_confianza = $row['per_confianza'];
    $domi_per = $row['domi_per'];
    $telefono_per = $row['telefono_per'];
    $persona_canaliza = $row['persona_canaliza'];
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $contacto[] = array('id'=> $id, 
    'entidad_federativa'=> $entidad_federativa, 
    'nom_usuaria'=> $nom_usuaria, 
    'sexo'=> $sexo, 
    'loca_procedencia'=> $loca_procedencia, 
    'loca_radica'=> $loca_radica,
    'telefono'=> $telefono, 
    'estad_civil'=> $estad_civil, 
    'grado_estudio'=> $grado_estudio, 
    'idioma'=> $idioma, 
    'grado_etnico'=> $grado_etnico, 
    'ocupacion'=> $ocupacion, 
    'tipo_atencion'=> $tipo_atencion,
    'hijos'=> $hijos, 
    'domicilio_actual'=> $domicilio_actual, 
    'per_vi_casa'=> $per_vi_casa, 
    'per_confianza'=> $per_confianza, 
    'domi_per'=> $domi_per, 
    'telefono_per'=> $telefono_per, 
    'persona_canaliza'=> $persona_canaliza,
   );
}

//desconectamos la base de datos
$close = mysqli_close($conexion)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



$json_string = json_encode($contacto); //documento json que se usa para almacenar los datos del array
echo $json_string;


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Para ser responsivo las paginas-->
    <title>DATOS DEL CONTACTO</title>

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
                <h1 color="blue"> DATOS DEL CONTACTO </h1><br>
            </center>
        </div>

        <!-- Contenido -->
        <section class="table-responsive">
            <!-- Indica la creacion de una seccion en el documento -->
            <!--Para ser responsivo las paginas-->


            <?php foreach ($contacto as $perso) { ?>

                <h1>
                    <label>ID: <?php echo $perso['id']; ?></label></br></br>
                    <label>ENTIDAD FEDERATIVA: <?php echo $perso['entidad_federativa']; ?></label></br></br>
                    <label>NOMBRE DE LA USUARIA: <?php echo $perso['nom_usuaria']; ?></label></br></br>
                    <label>SEXO: <?php echo $perso['sexo']; ?></label></br></br>
                    <label>LOCALIDAD DE PROCEDENCIA: <?php echo $perso['loca_procedencia']; ?></label></br></br>
                    <label>LOCALIDAD QUE RADICA: <?php echo $perso['loca_radica']; ?></label></br></br>
                    <label>TELEFONO: <?php echo $perso['telefono']; ?></label></br></br>
                    <label>ESTADO CIVIL: <?php echo $perso['estad_civil']; ?></label></br></br>
                    <label>GRADO DE ESTUDIO: <?php echo $perso['grado_estudio']; ?></label></br></br>
                    <label>IDIOMA: <?php echo $perso['idioma']; ?></label></br></br>
                    <label>GRADO ETNICO: <?php echo $perso['grado_etnico']; ?></label></br></br>
                    <label>OCUPACION: <?php echo $perso['ocupacion']; ?></label></br></br>
                    <label>ATENCION QUE REQUIERE: <?php echo $perso['tipo_atencion']; ?></label></br></br>
                    <label>HIJOS: <?php echo $perso['hijos']; ?></label></br></br>
                    <label>DOMICILIO ACTUAL: <?php echo $perso['domicilio_actual']; ?></label></br></br>
                    <label>PERSONAS VIVIENDO EN CASA: <?php echo $perso['per_vi_casa']; ?></label></br></br>
                    <label>PERSONA DE CONFIANZA: <?php echo $perso['per_confianza']; ?></label></br></br>
                    <label>DOMICILIO DE LA PERSONA: <?php echo $perso['domi_per']; ?></label></br></br>
                    <label>TELEFONO DE LA PERSONA: <?php echo $perso['telefono_per']; ?></label></br></br>
                    <label>PERSONA QUE CANALIZA: <?php echo $perso['persona_canaliza']; ?></label></br></br>
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