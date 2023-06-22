<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/EquipeController.php");

$idEquipe = $_GET["id"];

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe);

if($equipe != null) {
    //Deletar o equipe
    $equipeCont->excluir($equipe);

    //Retornar para a página inicial
    header("location: listEquipes.php");

} else { 
    echo "A equipe de ID ".$idEquipe." não existe.";
    echo "<br>";
    echo "<a href='listEquipes.php'>Voltar</a>";
}

?>