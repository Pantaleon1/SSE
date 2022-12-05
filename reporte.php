<?php

include 'php/conexion_be.php';
$reporte = json_decode($_POST['json'],true);
foreach ($reporte as $reporte){
     $id = $reporte['id'];
     $entidad_federal = $reporte['entidad_federal'];
     $municipio = $reporte['municipio'];
     $responsable = $reporte['responsable'];
     $person_report = $reporte['person_report'];
     $sexo = $reporte['sexo'];
     $edad = $reporte['edad'];
     $local_radica = $reporte['local_radica'];
     $telefono = $reporte['telefono'];
     $domicilio = $reporte['domicilio'];
     $grado_estu = $reporte['grado_estu'];
     $idioma = $reporte['idioma'];
     $grupo_etnico = $reporte['grupo_etnico'];
     $ocupacion = $reporte['ocupacion'];
     $parentesco = $reporte['parentesco'];

     $guardar = mysqli_query($conexion, "INSERT INTO reporta_caso (id, entidad_federal, municipio, responsable, 
     person_report, sexo, edad, local_radica, telefono, domicilio, grado_estu, idioma, grupo_etnico, ocupacion, parentesco) 
     VALUES ('$id', '$entidad_federal', '$municipio', '$responsable', '$person_report', 
     '$sexo', '$edad', '$local_radica', '$telefono', '$domicilio', '$grado_estu', '$idioma', 
     '$grupo_etnico', '$ocupacion', '$parentesco' )");
     
     $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
        alert("Usuario almacenado exitosamente");
        window.location = "reporte.html";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Intentalo de nuevo, Usuario NO almacenado exitosamente");
        window.location = "reporte.html";
        </script>
        
        ';
    }
     mysqli_close($conexion);
}
?>