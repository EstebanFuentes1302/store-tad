<?php
#<oAdministrador -> 0
#Gerente -> 1
#Vendedor -> 2
  session_start();
  include_once('../model/Usuario.php')
  $Usuario = new Usuario;
  if(isset($_POST['dnipost']) && !empty($_POST['dnipost']) && isset($_POST['nombrepost']) && !empty($_POST['nombrepost']) && isset($_POST['userpost']) && !empty($_POST['userpost']) && isset($_POST['passpost']) && !empty($_POST['passpost'])){
      $id = $_POST['dnipost'];
      $name = $_POST['nombrepost'];
      $user = $_POST['userpost'];
      $password = md5($_POST['passpost']);
      $role=$_POST['Seleccion'];

      //Preparación de consulta
      $data = array(
        "id" => $id,
        "name" => $name,
        "user" => $user,
        "password" => $password,
        "role" => $role
      );

      $response = $Usuario -> agregar($data);
      if($response){
        $message = $response->body;
        if($response->error == false){
          echo '
            <script type="text/javascript">
              alert("'.$message.'");
              window.location.href="../view/FormCrearUsuario.php";
            </script>\n\n';
        }else{
          echo '
            <script type="text/javascript">
              console.log("holaa")
              alert("Ocurrió un error: '.$message->code.'");
              window.location.href="../view/FormCrearUsuario.php";
            </script>';
        }
      }
      
      // try{
      //   $query = "INSERT INTO usuario (DNI,nombre,user,Contrasena,rol) values ('" . $dni . "','" . $nombre . "','" . $usuario. "','" . $password  . "','" . $rol  . "'); ";
      //   $result = mysqli_query($conn,$query);
      //   echo'<script type="text/javascript">
      //   alert("Registrado con exito");
      //   window.location.href="FormListaUsuarios.php";
      //   </script>';
      // }catch (Exception $e) {
      //   echo'<script type="text/javascript">
      //   alert("Registrado SIN EXITO,Dni ya registrado");
      //   window.location.href="FormCrearUsuario.php";
      //   </script>';
      // }
  }
    else{
      echo'<script type="text/javascript">
      alert("FALTAN DATOS");
      window.location.href="FormCrearUsuario.php";
      </script>';

    }

  

?>