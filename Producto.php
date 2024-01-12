
<?php
include_once "db.php";
class Producto
{

    public static function obtener()
    {
        global $conn;
        $resultado = $conn->query("SELECT ProductID, NombreProducto ,Descripcion,Precio,  Stock ,FotoProducto FROM producto");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerUno($id)
    {
        global $conn;
        $sentencia = $conn->prepare("SELECT * FROM producto WHERE ProductID = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        
        $resultado = $sentencia->get_result();
    
        return $resultado->fetch_object();
        
    }

    public static function eliminar($id)
    {
        global $conn;
        $sentencia = $conn->prepare("DELETE FROM producto WHERE ProductID = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
      
    }
    public static function Actualizar($nomb,$descrip,$precio,$Stock,$id)
    {
        global $conn;
        
        $sentencia = $conn->prepare("update producto set NombreProducto= ?, Descripcion = ?,Precio = ?,Stock = ? where ProductID = ?");
        $sentencia->bind_param("ssssi",$nomb,$descrip,$precio, $Stock, $id);
        $sentencia->execute();
        
    }

}