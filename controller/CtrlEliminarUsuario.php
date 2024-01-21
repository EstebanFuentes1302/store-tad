
<?php
    include_once "../model/db.php";
    include_once "../model/Usuario.php";
    $usuario = new Usuario; 
    $response = $usuario->eliminar($_GET["id"]);
    $message = $response->body;
    if($response){
        if($response->error == false){
            echo'<script type="text/javascript">
                alert("'.$message.'");
                window.location.href="../view/FormListaUsuarios.php";
            </script>';
        }  
    }else{
        echo'<script type="text/javascript">
        alert("Ocurrió un error: '.$message->code.'");
        window.location.href="../view/FormListaUsuarios.php";
        </script>';
    }
    
?>