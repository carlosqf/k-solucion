<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../../imagenes/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <title>Usuarios</title>     
        <script type="text/javascript" src="../Librerias/jquery.js"></script>   
        <link rel="stylesheet" type="text/css" href="../estilos/vista_cliente.css"/>            
        <script type="text/javascript" src="../Librerias/jquery.jeditable.js"></script>
    </head>    
    <body bgcolor="#818286">
        <div id="pagina" style="background-color: white; width: 1000px; text-align: center; margin: 0 auto;">
            <?php
            require_once '../general/cabezera.php';
            ?>            
            <div id="contenido">                
                <?php
                require_once ($view->plantilla);
                ?>
            </div>        
        </div>
    </body>
</html>