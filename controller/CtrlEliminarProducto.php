
<?php
    include_once "../model/Producto.php";
    $p = new Producto;
    $response = $p -> eliminar($_GET["id"]);
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
                    alert("'.$message -> code.'");
                    window.location.href="../view/FormProductos.php";
                </script>';
        }
        
    }else{
        echo'
            <script type="text/javascript">
                alert("No se pudo eliminar");
                window.location.href="../view/FormProductos.php";
            </script>';
    }
    
?>
