<?php
  include('../model/db.php');
  session_start();
  #Usuario
  if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
      $usuario = $_POST['usuario'];
      $password = md5($_POST['password']);
      $query = "SELECT * FROM usuario WHERE (id ='$usuario' && password = '$password')";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result)>0){
       $Arreglo = mysqli_fetch_assoc($result);
       print_r($Arreglo);
       $_SESSION['NombUser']=$Arreglo['name'];
       $_SESSION['dniuser']=$Arreglo['id'];
       $_SESSION['RolUser']=$Arreglo['role'];
        echo'<script type="text/javascript"S>
          window.location.href="../view/FormProductos.php";
        </script>';
      }
      else{ echo'<script type="text/javascript">S
        alert("Usuario o contraseña incorrecta");
        window.location.href="index.php";
        </script>';}

  }

?>