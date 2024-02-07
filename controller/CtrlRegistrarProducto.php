<?php
    //capturando datos
    $binariosImagen="";
    $tipoArchivo="";

    include_once "../model/Producto.php";
    include_once "../model/repository/ProductoApiRestRepository.php";
    $productoRepository = new ProductoApiRestRepository;
    $p = new Producto($productoRepository);

    if (isset($_FILES['Foto']['name'])) {
        $tipoArchivo = $_FILES['Foto']['type'];
        $permitido=array("image/png","image/jpeg");
        if( in_array( $tipoArchivo, $permitido) == false ){
            die('
                <script type="text/javascript">
                    alert("Archivo NO PERMITIDO");
                    window.location.href="index.php";
                </script>
            ');
        }
    }
    //PARA EL ARCHIVO DE IMAGEN
    $end_name = explode(".", $_FILES['Foto']['name']);
    $image_name =  $_FILES['Foto']['name'];
    $ext = end($end_name); 
    $nombre_imagen = "$image_name.$ext";
    $temporal = $_FILES['Foto']['tmp_name'];
    $carpeta = '../img/products';
    $ruta_foto = $carpeta.'/'.$nombre_imagen;

    if(move_uploaded_file($temporal, $ruta_foto)){
        
        $data = array(
            "name" => $_POST['name'],
            "description" => $_POST['description'],
            "price" => $_POST['price'],
            "stock" => $_POST['stock'],
            "path" => $ruta_foto
        );


        $apiResponse = $p -> insertar(json_encode($data));
        $responseBody = $apiResponse -> body;

        if($apiResponse){
            if($apiResponse -> error == false){
                echo'<script type="text/javascript">
                        alert("'.$responseBody.'");
                        window.location.href="../view/FormProductos.php";
                    </script>';
            }else{
                echo'<script type="text/javascript">
                        alert("'.$responseBody -> code.'");
                        window.location.href="../view/FormRegistrar.php";
                    </script>';
            }
        }else{
            // echo'<script type="text/javascript">
            //         alert("Error al agregar producto");
            //         window.location.href="../view/FormRegistrar.php";
            //     </script>';
        }
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