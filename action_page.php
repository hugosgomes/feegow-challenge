<?php

require_once("config.php");

$agendamento = new Agendamento();
$agendamento->setData($_POST);
$resultado = $agendamento->insert();

echo $resultado;

?>