<?php

include 'php/conexion_be.php';
$agresor = json_decode($_POST['json'],true);
foreach ($agresor as $agresor){
     $id = $agresor['id'];
     $nombre_completo = $agresor['nombre_completo'];
     $edad = $agresor['edad'];
     $sexo = $agresor['sexo'];
     $gra_estudio = $agresor['gra_estudio'];
     $ocupacion = $agresor['ocupacion'];
     $ingre_mes = $agresor['ingre_mes'];
     $adiccion = $agresor['adiccion'];
     $vive_usuaria = $agresor['vive_usuaria'];
     $antecedentes = $agresor['antecedentes'];
     $tipo_violencias = $agresor['tipo_violencias'];
     $resena = $agresor['resena'];
     $guardar = mysqli_query($conexion, "INSERT INTO persona_violenta (id, nombre_completo, edad, sexo, gra_estudio, ocupacion, ingre_mes, adiccion, vive_usuaria, antecedentes, tipo_violencias, resena) 
VALUES ('$id', '$nombre_completo', '$edad', '$sexo', '$gra_estudio', '$ocupacion', '$ingre_mes', '$adiccion', '$vive_usuaria', '$antecedentes', '$tipo_violencias', '$resena' )");
     
     $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
        alert("Usuario almacenado exitosamente");
        window.location = "agresor.html";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Intentalo de nuevo, Usuario NO almacenado exitosamente");
        window.location = "agresor.html";
        </script>
        
        ';
    }
     mysqli_close($conexion);
}
?>