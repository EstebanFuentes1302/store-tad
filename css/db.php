<?php

$conn = mysqli_connect('bdalamacentad.mysql.database.azure.com','dbroot@bdalamacentad','123.root','TiendaVirtual');
if (!$conn) {
die("Error de conexion: " . mysqli_connect_error());
}

?>