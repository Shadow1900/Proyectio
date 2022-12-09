<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>
        #targeta,#deposito,#transferencia{
            display: none;
        }
    </style>
</head>

<body>
  <button type="button" onclick="mostrartargeta();">Targeta</button>
   <button type="button" onclick="mostrardeposito();">Deposito</button>
   <button type="button" onclick="mostrarTransferencia();">Transferencia</button>
   
   <div id="targeta">
      <form action="" method="post">
      Numero de targeta:   <input type="text"> <br>
      CVV:                 <input type="text"> <br>
     Fecha de Expiracion:  <input type="text"> <input type="text"><br>  
      </form>
       
   </div>
   <div id="deposito">
      <form action="" method="post">
       Ingresa tu nombre: <input type="text">   
      </form>
   </div>
   <div id="transferencia">
       <form action="" method="post">
           <input type="checkbox">OXXO <br>
           <input type="checkbox">7 eleven <br>
           <input type="checkbox">Circle K <br>
           <input type="checkbox">otros <br>
       </form>
   </div>
   <script type="text/javascript">
       function mostrartargeta(){
           document.getElementById('targeta').style.display='block';
           document.getElementById('deposito').style.display='none';
           document.getElementById('transferencia').style.display='none';
       }
       function mostrardeposito(){
           document.getElementById('targeta').style.display='none';
           document.getElementById('deposito').style.display='block';
           document.getElementById('transferencia').style.display='none';
       }
       function mostrarTransferencia(){
           document.getElementById('targeta').style.display='none';
           document.getElementById('deposito').style.display='none';
           document.getElementById('transferencia').style.display='block';
       }
   </script>
</body>

</html>
