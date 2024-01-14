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
    }
    //PARA EL ARCHIVO DE IMAGEN
    $end_name = explode(".", $_FILES['Foto']['name']);
    $ext = end($end_name); 
    $nombre_imagen = "image.$ext";
    $temporal = $_FILES['Foto']['tmp_name'];
    $carpeta = 'img/products';
    $ruta_foto = $carpeta.'/'.$nombre_imagen;

    if(move_uploaded_file($temporal, $ruta_foto)){
        $v1 = $_POST['Nom'];
        $v2 = $_POST['Descip'];
        $v3 = $_POST['Preci'];
        $v4 = $_POST['Stock'];

        $query = "INSERT INTO producto (NombreProducto , Descripcion, Precio,  Stock , Ruta) values('" . $v1 . "','" . $v2. "','". $v3. "','" . $v4  . "','" . $ruta_foto ."');";
        if(mysqli_query($conn, $query)) {
            
            echo'<script type="text/javascript">
            alert("Registrado con exito");
            window.location.href="FormProductos.php";
            </script>';
        } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        echo json_encode('noupload');
    }
        // $nombreArchivo = $_FILES['Foto']['name'];
        // $tamanoArchivo = $_FILES['Foto']['size'];
        // $imagenSubida = fopen($_FILES['Foto']['tmp_name'], 'r');
        // $binariosImagen = fread($imagenSubida, $tamanoArchivo);}
        // $binariosImagen = mysqli_escape_string($conn, $binariosImagen);
        // echo mysqli_escape_string($conn, $binariosImagen);

?>