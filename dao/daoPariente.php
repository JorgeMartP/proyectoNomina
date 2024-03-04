<?php 

interface DaoPariente{
    public function registrar(Pariente $p);
    public function modificar(Pariente $p);
    public function eliminar(Pariente $p);
    //public function buscar($campo,$dato);
    public function listar();
}
?>