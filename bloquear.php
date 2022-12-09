<?php
    require 'base.php';
    $records = $conn->prepare('UPDATE usuario SET bloqueada=1 WHERE usuario.email = :email');
    $records->bindParam(':email',$_POST['email']);
    $records->execute();

?>