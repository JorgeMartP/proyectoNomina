

<?php

require('../dao/daoParienteImpl.php');

$dao = new DaoParienteImpl();
$Pariente=$dao->listar();

?>