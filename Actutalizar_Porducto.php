<?php

include_once "Producto.php";
$Productos = Producto::Actualizar($_POST["Nom"],$_POST["Descip"],$_POST["Preci"],$_POST["Stock"],$_POST["id"]);
echo'<script type="text/javascript">
alert("Actualizado con exito");
window.location.href="FormProductos.php";
</script>';
 ?>
