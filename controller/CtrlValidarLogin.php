<?php
  session_start();
  include_once("../model/Usuario.php");
	include_once("../model/repository/UsuarioApiRestRepository.php");
	$usuarioRepository = new UsuarioApiRestRepository;
	$u = new Usuario($usuarioRepository);
  #Usuario
  if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
      $usuario = $_POST['usuario'];
      $password = md5($_POST['password']);
      $apiResponse = $u -> obtenerUno($usuario);
      $messageBody = $apiResponse -> body;
      if(count($messageBody)>0){
        $user = $messageBody[0];
        //print_r($user);
        if($apiResponse){
          if($apiResponse -> error == false){
            if($user -> id == $usuario && $user -> password == $password){
              $_SESSION['NombUser'] = $user -> name;
              $_SESSION['dniuser'] = $user -> id;
              $_SESSION['RolUser'] = $user -> role;
              echo'<script type="text/javascript">
                window.location.href="../view/FormProductos.php";
                </script>';
            }else{
              echo'<script type="text/javascript">
                alert("Usuario o contraseña incorrecta");
                window.location.href="../index.php";
                </script>';
            }
          }else{
            echo'<script type="text/javascript">
                alert("Ocurrió un error: '.$user -> code.'");
                window.location.href="../index.php";
                </script>';
          }
        }
      }else{
        echo'<script type="text/javascript">S
            alert("Usuario o contraseña incorrecta");
            window.location.href="../index.php";
            </script>';
      }
      

  }

?>