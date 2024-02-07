
<?php
include_once('repository/ProductoRepositoryInterface.php');
class Producto
{
    private $productoRepository;

    public function __construct(ProductoRepositoryInterface $productoRepository) {
        $this->productoRepository = $productoRepository;
    }

    public function insertar($data){
        return $this -> productoRepository -> insertar($data);
    }

    public function obtener()
    {  
        return $this -> productoRepository -> obtener();
    }

    public function obtenerUno($id)
    {
        return $this -> productoRepository -> obtenerUno($id);
    }

    public function eliminar($id)
    {
        return $this -> productoRepository -> eliminar($id);
    }
    public function actualizar($data)
    {
        return $this -> productoRepository -> actualizar($data);
    }
}
