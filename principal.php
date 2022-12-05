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
        <link rel="stylesheet" href="css/principal.css">
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
            <a href="registrar.html">
                <div class="option">
                
                    <i class="fa-solid fa-address-card" title="Registrar"></i>
                    
                    <a href="registrar.html">Registro</a>
                </div>
            </a>
            

            
            <a href="contacto.html">
                <div class="option">
                <i class="fa-solid fa-address-book" title="Contacto"></i>
                    <a href="contacto.html">Primer contacto</a>
                </div>
            </a>

            

            <a href="agresor.html">
                <div class="option">
                    <i class="far fa-id-badge" title="Agresor"></i>
                    <a href="agresor.html">Agresor</a>
                </div>
            </a>

            <a href="reporte.html">
                <div class="option">
                    <i class="far fa-address-card" title="Reporte"></i>
                    <a href="reporte.html">Reporte</a>
                

                </div>
            </a>

            <a href="php/cerrar_sesion.php">
                <div class="option">
                    <i class="fa-sharp fa-solid fa-rectangle-xmark" title="Cerrar sesion" ></i>
                    <a href="php/cerrar_sesion.php">Cerrar sesion</a>
                
                </div>
            </a>

        </div>

    </div>
   

    <main>
    <div class="logo"> 
    <center><img src="img/principal.png" width=1400px; height= 700px; position= center; ></center>
</div>
    <!--<script src="https://kit.fontawesome.com/af8a124256.js" crossorigin="anonymous"></script>
        <h3><i class="fa-solid fa-house"></i> INICIO;</h3> Aquí encontraras los 4 campos que conforma nuestra aplicación web como son Registrar, Servicios, Contacto y Nosotros <br><br>
        
        <h3><p><i class="fa-regular fa-address-card"></i> REGISTRO;</h3> En este campo se iran registrando las personas que llegan a ser violentadas, les pedirán datos como nombre del municipio, cargo o nombre de la responsable de la atención. etc</p> <br><br>
        
        <h3><p><i class="fa-regular fa-address-book"></i> PRIMER CONTACTO;</h3> En este campo nos mostrara los diferentes servicios que brinda el instituto municipal de la mujer como son: trabajó social, asesoría legal y atención psicologíca.</p> <br><br>
        
        <h3><p><i class="fa-regular fa-id-badge"></i> AGRESOR;</h3> Este campo solicitará datos del contacto como son: Entidad federativa, municipio de atención, responsable de la atención. entre otros datos.</p> <br>
       
        <h3><p><i class="fa-regular fa-circle-user"></i> REPORTE; </h3>En este campo solicitará los siguientes datos como son: Grado de estudios, Idioma, Grupo étnico, ocupacion, Parentesco con la persona que sufre violencia por qué la conoce y persona o ínstitucion que canaliza.etc</p> <br><br>    

        <h3><p><i class="fa-regular fa-circle-xmark"></i> CERRAR SESIÓN;</h3> Una vez terminido el registro de la victimaria. esta ventana cierra sesión que dara por finalizado el registro.</p> 
        
        
    </main>-->

        <h1></h1>
       

        <script src="js/principal.js"></script>
    </body>
</html> 