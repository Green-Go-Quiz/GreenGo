<?php
#Arquivo para executar a inclusão de uma equipe

include_once(__DIR__."/../../models/EquipeModel.php");
include_once(__DIR__."/../../controllers/EquipeController.php");

//Capturar os valores vindos do formulário
$nomeEquipe = $_POST["Nome_Equipe"];
$codEquipe = $_POST["Cod_Equipe"];
$corEquipe = $_POST["Cor_Equipe"];
$iconeEquipe = $_POST["imagem"];

//Criar o objeto equipe
$equipe = new Equipe();
$equipe->setNomeEquipe($nomeEquipe);
$equipe->setCodEntrada($codEquipe);
$equipe->setCorEquipe($corEquipe);
$equipe->setIconeEquipe($iconeEquipe);


//Chamar o controler para salvar a equipe
$equipeCont = new EquipeController();
$equipeCont->salvar($equipe);

//Redireciona para o início
header("location: listEquipes.php");

?>