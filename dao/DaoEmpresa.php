<?php
interface DaoEmpresa{
    public function registrar(Empresa $e);
    public function modificar(Empresa $a);
    public function eliminar(Empresa $e);
    public function traer($nit);
    //public function buscar($campo,$dato);
    public function listar();
}

?>