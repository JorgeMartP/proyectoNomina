<?php
interface DaoEmpresa{
    public function registrar(Empresa $a);
    public function modificar(Empresa $a);
    public function eliminar(Empresa $a);
    public function traer($nit);
    //public function buscar($campo,$dato);
    public function listar();
}

?>