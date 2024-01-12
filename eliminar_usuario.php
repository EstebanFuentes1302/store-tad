
<?php
include_once "db.php";
include_once "Usuarios.php";
Usuarios::eliminar($_GET["id"]);
echo'<script type="text/javascript">
alert("USUARIO Eliminado con exito");
window.location.href="FormListaUsuarios.php";
</script>';
