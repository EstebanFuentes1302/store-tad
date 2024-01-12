<?php
#<oAdministrador -> 0
#Gerente -> 1
#Vendedor -> 2
  include('db.php');
  session_start();

  if(isset($_POST['dnipost']) && !empty($_POST['dnipost']) && isset($_POST['nombrepost']) && !empty($_POST['nombrepost'])
  && isset($_POST['userpost']) && !empty($_POST['userpost'])
  && isset($_POST['passpost']) && !empty($_POST['passpost'])
  
  ){
      $dni = $_POST['dnipost'];
      $nombre = $_POST['nombrepost'];
      $usuario = $_POST['userpost'];
      $password = md5($_POST['passpost']);
      $rol=$_POST['Seleccion'];
      try{
      $query = "INSERT INTO usuario (DNI,nombre,user,Contrasena,rol) values ('" . $dni . "','" . $nombre . "','" . $usuario. "','" . $password  . "','" . $rol  . "'); ";
      $result = mysqli_query($conn,$query);
      echo'<script type="text/javascript">
      alert("Registrado con exito");
      window.location.href="FormListaUsuarios.php";
      </script>';
    } catch (Exception $e) {
      echo'<script type="text/javascript">
      alert("Registrado SIN EXITO,Dni ya registrado");
      window.location.href="FormCrearUsuario.php";
      </script>';

    }}
    else{
      echo'<script type="text/javascript">
      alert("FALTAN DATOS");
      window.location.href="FormCrearUsuario.php";
      </script>';

    }

  

?>