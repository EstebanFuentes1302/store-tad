<?php
#<oAdministrador -> 0
#Gerente -> 1
#Vendedor -> 2
  include('db.php');
  session_start();

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

      //Llamada a la API
      try{
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://tad-store-api.azurewebsites.net/api/users/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        $message = $response->body;
        print_r($message);
        if($response->error == false){
          echo '
            <script type="text/javascript">
              alert("'.$message.'");
              window.location.href="FormCrearUsuario.php";
            </script>\n\n';
        }else{
          echo '
            <script type="text/javascript">
              console.log("holaa")
              alert("Ocurrió un error: '.$message->code.'");
              window.location.href="FormCrearUsuario.php";
            </script>';
        }
      }catch(Exception $err){
        echo $err;
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