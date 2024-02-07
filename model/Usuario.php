

<?php
include_once('repository/UsuarioRepositoryInterface.php');
class Usuario
{
    private $usuarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository){
        $this -> usuarioRepository = $usuarioRepository;
    }

    public function obtener()
    {
        return $this -> usuarioRepository -> obtener();     
    }

    public function obtenerUno($id){
        return $this -> usuarioRepository -> obtenerUno($id);
    }

    public function eliminar($id)
    {   
        return $this -> usuarioRepository -> eliminar($id);
    }

    public function agregar($data){
        return $this -> usuarioRepository -> agregar($data);
    }
}
