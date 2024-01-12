
<?php
include_once "db.php";
include_once "Producto.php";
Producto::eliminar($_GET["id"]);
echo'<script type="text/javascript">
alert("Eliminado con exito");
window.location.href="FormProductos.php";
</script>';
