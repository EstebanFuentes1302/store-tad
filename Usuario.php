
<?php
include_once "db.php";
class Usuario
{

    public static function obtener()
    {
        global $conn;
        $resultado = $conn->query("SELECT * FROM usuario");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

 

    public static function eliminar($id)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM usuario WHERE DNI = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
      
    }
 
 

}
