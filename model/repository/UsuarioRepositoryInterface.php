<?php

    interface UsuarioRepositoryInterface {
        public function agregar($data);
        public function obtener();
        public function obtenerUno($id);
        public function eliminar($id);
    }

?>