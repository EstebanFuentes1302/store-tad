<?php
    include_once "../model/Producto.php";
    $Producto = Producto::Actualizar($_POST["name"],$_POST["description"],$_POST["price"],$_POST["stock"],$_POST["id"]);
    echo'
        <script type="text/javascript">
        alert("Actualizado con exito");
        window.location.href="../view/FormProductos.php";
        </script>';
 ?>
