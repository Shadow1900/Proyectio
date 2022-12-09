<?php
    session_start();
    require 'base.php';
    $mensaje = '';
    if(!empty($_POST['email']) && !empty($_POST['nom'])){
        $records = $conn->prepare('SELECT id,nombre, email,cuenta, password, bloqueada FROM usuario WHERE email=:email');
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 && $_POST['email'] == $results['email']){
                $_SESSION['user_id'] = $results['id'];
               header("Location:Cambio.php");
            }else{
                 $message = 'Lo sentimos, no existe la cuenta';
            }
            
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Login Form - Modal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>
    <link rel="stylesheet" href="./style_recu.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- Form-->
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Recuperacion de Cuenta</h1>
            </div>
            <div class="form-content">
                <form action="Recuperar.php" method="post">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Ingresa tu email" required>
                        <input type="text" name="nom" placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Log In</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-panel two">
            <div class="form-header">
                <h1>Iniciar Sesion</h1>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required="required" />
            </div>
            <div class="form-content">
                <form action="" method="">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required="required" />
                    </div>
                    <div class="form-group">
                        <button type="submit">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>
    <script src="./script_recu.js"></script>

</body>

</html>
