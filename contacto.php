<?php

include 'php/conexion_be.php';
$contacto = json_decode($_POST['json'],true);
foreach ($contacto as $contacto){
     $id = $contacto['id'];
     $entidad_federativa = $contacto['entidad_federativa'];
     $nom_usuaria = $contacto['nom_usuaria'];
     $sexo = $contacto['sexo'];
     $loca_procedencia = $contacto['loca_procedencia'];
     $loca_radica = $contacto['loca_radica'];
     $telefono = $contacto['telefono'];
     $estad_civil = $contacto['estad_civil'];
     $grado_estudio = $contacto['grado_estudio'];
     $idioma = $contacto['idioma'];
     $grado_etnico = $contacto['grado_etnico'];
     $ocupacion = $contacto['ocupacion'];
     $tipo_atencion = $contacto['tipo_atencion'];
     $hijos = $contacto['hijos'];
     $domicilio_actual = $contacto['domicilio_actual'];
     $per_vi_casa = $contacto['per_vi_casa'];
     $per_confianza = $contacto['per_confianza'];
     $domi_per = $contacto['domi_per'];
     $telefono_per = $contacto['telefono_per'];
     $persona_canaliza = $contacto['persona_canaliza'];
     $guardar = mysqli_query($conexion, "INSERT INTO primer_contacto (id, entidad_federativa, nom_usuaria, sexo, 
     loca_procedencia, loca_radica, telefono, estad_civil, grado_estudio, idioma, grado_etnico, ocupacion, 
     tipo_atencion, hijos, domicilio_actual, per_vi_casa, per_confianza, domi_per, telefono_per, 
     persona_canaliza) VALUES ('$id', '$entidad_federativa', '$nom_usuaria', '$sexo', '$loca_procedencia', 
     '$loca_radica', '$telefono', '$estad_civil', '$grado_estudio', '$idioma', '$grado_etnico', '$ocupacion', 
     '$tipo_atencion', '$hijos', '$domicilio_actual', '$per_vi_casa', '$per_confianza', '$domi_per', 
     '$telefono_per', '$persona_canaliza' )");
     
     $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
        alert("Usuario almacenado exitosamente");
        window.location = "contacto.html";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Intentalo de nuevo, Usuario NO almacenado exitosamente");
        window.location = "contacto.html";
        </script>
        
        ';
    }
     mysqli_close($conexion);
}
?>