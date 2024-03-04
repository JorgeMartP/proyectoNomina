<?php

interface DaoEmpleado{
    public function registrar(Empleado $e);
    public function  modificar(Empleado $e);
    public function eliminar (Empleado $e);
    public function listar ();

}
?>