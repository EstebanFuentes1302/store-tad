
<?php
    include_once("../model/Usuario.php");
	include_once("../model/repository/UsuarioApiRestRepository.php");
	$usuarioRepository = new UsuarioApiRestRepository;
	$usuario = new Usuario($usuarioRepository);
    
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