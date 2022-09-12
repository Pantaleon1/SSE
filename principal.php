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
        <title> bienvenido</title>
        <link rel="stylesheet" href="assets/css/principal.css">
        <script src="https://kit.fontawesome.com/ed54238029.js" crossorigin="anonymous"></script>
    </head>
    
    <body id="body">
    <header>
        <div class="icon__me">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
        <i class="fa-regular fa-person-dress"></i>
            
            <h4>MagtimusPro</h4>
        </div>

        <div class="options__menu">	

            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-file" title="Portafolio"></i>
                    <h4>Portafolio</h4>
                </div>
            </a>
            
            <a href="#">
                <div class="option">
                    <i class="fas fa-video" title="Cursos"></i>
                    <h4>Cursos</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-sticky-note" title="Blog"></i>
                    <h4>Blog</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>Contacto</h4>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

        </div>

    </div>
   

    <main>
        <h1>Title Exemple</h1><br>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam sapiente cumque dicta animi explicabo sequi. Ex amet et, dolor eligendi commodi consectetur quo voluptatibus, cum nemo porro veniam at blanditiis?</p> <br>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident adipisci beatae impedit quia, deleniti quasi sequi iusto exercitationem nihil nulla, laboriosam dolore corrupti fuga officiis? Odit a mollitia id magnam amet delectus quia blanditiis reprehenderit explicabo eveniet! Rem voluptatum explicabo ipsum quae, dolorum, laudantium doloribus a, illum saepe sapiente accusantium dicta reiciendis? Amet iure porro voluptatum error fugit odit voluptas?</p>
    
        
    </main>

        <h1></h1>
        <a href="php/cerrar_sesion.php">Cerrar sesion</a>

        <script src="assets/js/principal.js"></script>
    </body>
</html> 