<?php
    $admin = 'livan7241@gmail.com';
    $destino =  $_POST['email'];

    $asunto='Respuesta a el formulario de contactanos';
    
    $header= "<h1>"."Bienvenidos a nuestro sitio"."</h1>";
    $mesj = 'Tu solicitud estaciondo procesada \n Esperamos tener darke una solucion rapida.';
    
    mail($destino,$asunto,$mesj,$header);
    echo "<script>alert('correo enviado exitosamente')</script>";
    echo "<script> setTimeout(\"location.href='index.php'\",1000)</script>";


?>