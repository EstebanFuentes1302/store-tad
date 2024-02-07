<?php
    include_once "../model/Producto.php";
    $producto = new Producto;
    $data = array(
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "stock" => $_POST["stock"],
        "id" => $_POST["id"],
    );

    $response = $producto -> actualizar(json_encode($data));
    $message = $response -> body;

    if($response){
        if($response -> error == false){
            echo'
            <script type="text/javascript">
            alert("'.$message.'");
            window.location.href="../view/FormProductos.php";
            </script>';
        }else{
            echo'
            <script type="text/javascript">
            alert("Ocurrió un error:'.$message->code.'");
            window.location.href="../view/FormProductos.php";
            </script>';
        }
        
    }else{
        echo'
            <script type="text/javascript">
            alert("No se pudo actualizar");
            window.location.href="../view/FormProductos.php";
            </script>';
    }
    
 ?>
