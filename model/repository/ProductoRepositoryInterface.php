<?php

    interface ProductoRepositoryInterface {
        public function insertar($data);
        public function obtener();
        public function obtenerUno($id);
        public function eliminar($id);
        public function actualizar($data);
    }

?>