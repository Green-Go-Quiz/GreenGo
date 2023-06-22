<?php
#Arquivo para executar a inclusão de uma zona

include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../controllers/ZonaController.php");

//Capturar os valores vindos do formulário
$nomeZona = $_POST["Nome_Zona"];

//Criar o objeto zona
$zona = new Zona();
$zona->setNomeZona($nomeZona);


//Chamar o controler para salvar a zona
$zonaCont = new ZonaController();
$zonaCont->salvar($zona);

//Redireciona para o início
header("location: listZonas.php");

?>