
<?php
class Usuario
{

    public static function obtener()
    {
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tad-store-api.azurewebsites.net/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            //Envía la respuesta desde JSON como Objeto, y dentro del body hay un arreglo de objetos
            return json_decode($response)->body;
        }catch(Exception $e){
            echo $e;
            return false;
        }
        
    }

    public static function obtenerUno($id){
        try{
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://tad-store-api.azurewebsites.net/api/users/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response);
        }catch(Exception $e){
            echo $e;
            return false;
        }
        
    }

    public static function eliminar($id)
    {   
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tad-store-api.azurewebsites.net/api/users/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            ));

            $response = curl_exec($curl);
            
            curl_close($curl);
            return json_decode($response);
        }catch(Exception $e){
            echo $e;
            return false;
        }
        
    }

    public static function agregar($data){
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://tad-store-api.azurewebsites.net/api/users/',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => json_encode($data),
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return json_decode($response);
          }catch(Exception $e){
            return false;
          }
    }
}
