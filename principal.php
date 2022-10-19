<?php

session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("debes iniciar session");
            window.location = "index.php";
        </script>
        
        ';

        session_destroy();
        die();
            
        
    }
    

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> IMM</title>
        <link rel="stylesheet" href="assets/css/principal.css">
        <script src="https://kit.fontawesome.com/ed54238029.js" crossorigin="anonymous"></script>
    </head>
    
    <body id="body">
        
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>
        
        <h2>INSTITUTO MUNICIPAL DE LA MUJER</h2>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
        
        <i class="fa-solid fa-person-dress"></i>
            
            <h4>BIENVENIDO</h4>
        </div>

        <div class="options__menu">	

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i> 
                    <a href="principal.php"></a>
                    <h4>Inicio</h4>
                </div>
            </a>
<!--Formulario y registro de los datos del cliente-->
            <a href="#">
                <div class="option">
                
                    <i class="fa-solid fa-address-card" title="Registrar"></i>
                    
                    <a href="registrar.html">Registro</a>
                </div>
            </a>
            

            
            <a href="#" target="secc/servicios.php">
                <div class="option">
                <i class="fa-solid fa-address-book" title="Servicios"></i>
                    <a href="secc/servicios.php">Primer contacto</a>
                </div>
            </a>

            

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <a href="secc/nosotros.php">Agresor</a>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <a href="secc/nosotros.php">Reporte</a>
                

                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fa-sharp fa-solid fa-rectangle-xmark" title="Cerrar sesion" ></i>
                    <a href="php/cerrar_sesion.php">Cerrar sesion</a>
                
                </div>
            </a>

        </div>

    </div>
   

    <main>
        <h1>¡Somos Una Sociedad!</h1><br>
        <p>Somos un organismo público descentralizado que busca transversalizar la perspectiva de género en el ámbito municipal y promover la igualdad de género a través de la prevención y atención de la violencia hacia las mujeres.?</p> <br>

        <p>El instituto municipal de la mujer es una de las tantas acciones para avanzar  hacia una socciedad igualitaria a nivel municipal, buscamos Promover la igualdad de género en el Municipio de tuxtepec a través de la generación de política pública municipal con perspectiva de género y la atención integral a mujeres y sus familias que viven violencia, para revertir las dinámicas sociales que reproducen las violencias de género. </p>
    
        
    </main>

        <h1></h1>
       

        <script src="assets/js/principal.js"></script>
    </body>
</html> 