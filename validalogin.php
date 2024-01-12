<?php
  include('db.php');
  session_start();
  #Usuario
  if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
      $usuario = $_POST['usuario'];
      $password = md5($_POST['password']);
      $query = "SELECT * FROM usuario WHERE (DNI ='$usuario' && Contrasena = '$password')";
      // echo $query;
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result)>0){
       // echo $result['nombre'] ;
       $Arreglo = mysqli_fetch_assoc($result);
       $_SESSION['NombUser']=$Arreglo['Nombre'];
       $_SESSION['dniuser']=$Arreglo['DNI'];
       $_SESSION['RolUser']=$Arreglo['Rol'];
        echo'<script type="text/javascript">
        window.location.href="FormProductos.php";
        </script>';
      }
      else{ echo'<script type="text/javascript">
        alert("Usuario o contraseña incorrecta");
        window.location.href="index.php";
        </script>';}

  }

?>