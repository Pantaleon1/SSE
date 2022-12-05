<?php

ob_start();
include("../php/gen_registroJSON.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--Para ser responsivo las paginas-->
	<title>DATOS DEL REGISTRO</title>

	<!-- Bootstrap 5 CSS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
</head>
<style>
    
    body{
        font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body class="m-0 vh-100 row justify-content-center align-items-center"><!-- Cabecera -->
	<div class="container col-auto">
		<div>
			<center><h1 color="blue"> DATOS DE LA USUARIA </h1><br></center>
		</div>

		<!-- Contenido -->
		<section class="table-responsive"><!-- Indica la creacion de una seccion en el documento -->
			<!--Para ser responsivo las paginas-->

			<table class="table text-dark" id="tablajson" border="1" cellspacing="1" bordercolor="black" style="border-collapse:collapse; border-color: black; "><!-- Indica la creacion de una tabla -->
				<thead class=""><!-- Indica la creacion de la fila que se usara como encabezado en una tabla -->
					<th scope="col" style="background-color:#FFD7E1">ID</th><!-- Indica la creacion de una columna -->
					<th scope="col" style="background-color:#FFD7E1">MUNICIPIO</th>
					<th scope="col" style="background-color:#FFD7E1">PERIODO </th>
					<th scope="col" style="background-color:#FFD7E1">ATIENDE</th>
					<th scope="col" style="background-color:#FFD7E1">CARGO</th>
					<th scope="col" style="background-color:#FFD7E1">SERVICIO SOLICITADO</th>
					<th scope="col" style="background-color:#FFD7E1">FECHA</th>
					<th scope="col" style="background-color:#FFD7E1">SEXO</th>
					<th scope="col" style="background-color:#FFD7E1">USUARIA</th>
					<th scope="col" style="background-color:#FFD7E1">EDAD</th>
					<th scope="col" style="background-color:#FFD7E1">DIRECCION</th>
					<th scope="col" style="background-color:#FFD7E1">TELEFONO</th>
					<th scope="col" style="background-color:#FFD7E1">SERVICIO A BRINDAR</th>

				</thead>
				<tbody>
					<?php foreach($registrar as $perso){?>
					<tr>
						<th><?php echo $perso['id']; ?></th>
						<th><?php echo $perso['nombre_municipio']; ?></th>
						<th><?php echo $perso['periodo']; ?></th>
						<th><?php echo $perso['nombre_atiende']; ?></th>
						<th><?php echo $perso['cargo_atiende']; ?></th>
						<th><?php echo $perso['tipo_servicio']; ?></th>
						<th><?php echo $perso['fecha']; ?></th>
						<th><?php echo $perso['sexo']; ?></th>
						<th><?php echo $perso['nombre']; ?></th>
						<th><?php echo $perso['edad']; ?></th>
						<th><?php echo $perso['direccion']; ?></th>
						<th><?php echo $perso['telefono']; ?></th>
						<th><?php echo $perso['servicio_brindado']; ?></th>
					</tr>
				<?php } ?>
			</tbody><!-- Bloque de filas dando cuerpo a los datos -->
			</table>
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

//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');


$dompdf->render();

$dompdf->stream("archivo.pdf", array("Attachment" => false)); //si es true lo descarga automaticamente

?>