
<?php
include_once "db.php";
# Simplemente redireccionamos al listado de alumnos

//(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
//capturando datos
$binariosImagen="";
$tipoArchivo="";
if (isset($_FILES['Foto']['name'])) {
    $tipoArchivo = $_FILES['Foto']['type'];
    $permitido=array("image/png","image/jpeg");
    if( in_array( $tipoArchivo, $permitido) == false ){
        die('<script type="text/javascript">
        alert("Archivo NO PERMITIDO");
        window.location.href="VistaPrincipal.php";
        </script>');
    }
    $nombreArchivo = $_FILES['Foto']['name'];
    $tamanoArchivo = $_FILES['Foto']['size'];
    $imagenSubida = fopen($_FILES['Foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);}
    $binariosImagen = mysqli_escape_string($conn, $binariosImagen);

$v1 = $_REQUEST['Nom'];
$v2 = $_REQUEST['Descip'];
$v3 = $_REQUEST['Preci'];
$v4 = $_REQUEST['Stock'];



//conuslta SQL
$query = "INSERT INTO productos (NombreProducto ,Descripcion,Precio,  Stock ,FotoProducto,TipoFoto) values('" . $v1 . "','" . $v2. "','". $v3. "','" . $v4  . "','" . $binariosImagen ."','" . $tipoArchivo. "');";
 if(mysqli_query($conn, $query)) {
    
    echo'<script type="text/javascript">
    alert("Registrado con exito");
    window.location.href="FormProductos.php";
    </script>';
} else {
    
    //header('Location: index.html');
    
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
//Mensaje de conformidad
?>