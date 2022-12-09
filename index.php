<?php
    session_start();
    require 'base.php';
    require 'adicional/generar.php';
    $capcha = randomText(6);
    $mensaje = '';
    $com='0';
    $co='Normal';
    $cont = $conn->prepare('SELECT intentos FROM intento');
    $cont->execute();
    $contador=$cont->fetch(PDO::FETCH_ASSOC);
    $contadorf=$contador['intentos'];
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST["captcha"]) && $_POST["captcha"]==$_POST["respuesta"]){
        $records = $conn->prepare('SELECT id,nombre, email,cuenta, password, bloqueada FROM usuario WHERE email=:email');
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            $com1=$results['bloqueada'];
            if($com==$com1){
                $_SESSION['user_id'] = $results['id'];
               header("Location:princi.php");
            }else{
                 $message = 'Lo sentimos, la cuenta esta bloqueada';
            }
            
        }else{
            $message = 'Lo sentimos, esas credenciales no coinciden';
            echo $contadorf;
            $contadorf+=1;
            echo $contadorf;
            if($contadorf==3){
                 $message = 'Limite de w intentos alcanzado la cuenta a sido bloqueada';
                require 'bloquear.php';
                $con2 = $conn->prepare('UPDATE intento SET intentos=0 WHERE intento.id = 1');
                $con2->execute();
                $_SESSION['user_id'] = $results['id'];
                require 'envio/correo.php';
            }else{
                $con2 = $conn->prepare('UPDATE intento SET intentos=:cond WHERE intento.id = 1');
                $con2->bindParam(':cond',$contadorf);
                $con2->execute();
            }
        }
        if(!empty($_POST["remember"])){
            setcookie("email",$_POST["email"],time()+ 3600);
            setcookie("password",$_POST["password"],time()+ 3600);    
            echo "<br> Cookies Set Successfuly";
        }else{
            setcookie("username","");
            setcookie("password","");
            echo "<br> Cookies Not Set";
        }
    }else{
        $message = 'Lo sentimos, esas el capcha en incorrecto';
    }
    if(!empty($_POST['email2']) && !empty($_POST['password2'])){
        $con1=$_POST['password2'];
        $con2=$_POST['confrim_password'];
        if($con1==$con2){
         $sql = "INSERT INTO usuario (nombre, email,cuenta, password, bloqueada) VALUES (:nombre, :email, :cuenta, :password, :bloqueo)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre',$_POST['name']);
        $stmt->bindParam(':email',$_POST['email2']);
        $stmt->bindParam(':cuenta',$co);
        $stmt->bindParam(':bloqueo',$com);
        $password = password_hash($_POST['password2'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);
        if($stmt->execute()){
            $mensaje= 'Usuario Creado';
        }else{
            $mensaje= 'Error al Crear el Usuario';
        }   
        }else{
        $mensaje= 'Error la contraseña no coincide';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        p {
            /*font-family: 'Dancing Script', cursive;*/

        }

    </style>
</head>

<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="index.php" class="formulario__login" method="post">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" name="email" placeholder="Ingresa tu email" value="<?php if(isset($_COOKIE["email"])){ echo $_COOKIE["email"];}?>" class="con" required>
                    <input type="password" name="password" placeholder="Ingresa tu contraseña" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];}?>" class="con" required>
                    <p>
                        ingresa texto: <span> <?php echo $capcha ?> </span><br>
                        <input name="respuesta" type="text" size="6" class="con">
                        <input type="hidden" name="captcha" value="<?php echo $capcha ?>" class="con">
                    </p>
                    <input type="checkbox" name="remember" />recordar usuario <br>
                    <input type="submit" value="logear" class="boton" name="logear" class="con">
                </form>

                <!--Register-->
                <form action="index.php" class="formulario__register" method="post">
                    <h2>Regístrarse</h2>
                    <input type="text" name="name" placeholder="Ingrese tu nombre" class="con" required>
                    <input type="text" name="email2" placeholder="Ingresa tu email" class="con" required>
                    <input type="password" name="password2" placeholder="Ingresa tu contraseña" class="con" required>
                    <input type="password" name="confrim_password" placeholder="Confirma tu contraseña" class="con" required>
                    <input type="submit" value="registro" class="boton" name="registro" class="con">
                </form>

            </div>
        </div>
        <?php if(!empty($mensaje)): ?>
        <p><?php echo $mensaje ?></p>
        <?php endif; ?>
    </main>
    <a href="metodo.php">aa</a>
    <script src="script.js"></script>
</body>

</html>
