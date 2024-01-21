<?php
    $conn = mysqli_connect('db-server-store.mysql.database.azure.com','usr_reader','Peru2023$','bd_store');
        if (!$conn) {
            die("Error de conexion: " . mysqli_connect_error());
    }
?>