<?php
  session_start();

  require 'base.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, nombre, email,cuenta, password, bloqueada FROM usuario WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a nuestra pagina</title>
    <link rel="stylesheet" href="esilos/estilos.css">
</head>
<body>
 
    <?php if(!empty($user)): ?>
      <br> Welcome.<?= $user['nombre']; ?> <br> <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="loginout.php">
        Logout
      </a>
      <a href="Recuperar.php">aa</a>
    <?php else: ?>
   <h1>Por favor Inicia session o registrate</h1>
    <a href="login.php">login</a>
    <a href="singup.php">Sing UP</a>
    <a href="Recuperar.php">aa</a>
    <?php endif; ?>
</body>
</html>