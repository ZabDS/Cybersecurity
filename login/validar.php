<?php
  $usuario=$_POST['usuario'];
  $contrasena=$_POST['contrasena'];
  session_start();
  $_SESSION['usuario']=$usuario;

  $conexion=mysqli_connect("localhost","root","mypass","role");

  $consulta="SELECT * FROM usuario where usuario='$usuario' and contrasena='$contrasena'";
  $resultado=mysqli_query($conexion,$consulta);

  $filas=mysqli_fetch_array($resultado);

  if($filas['id-cargo']==1){ //administrador
    header("location:admin.php");
  }
  else
    if($filas['id-cargo']==2){ //cliente
      header("location:cliente.php");
    }
    else{
?>
      <?php
        include("index.html");
      ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
      //<?php
    }

  // cleanup
  mysqli_free_result($resultado);
  mysqli_close($conexion);
?>

