<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/PlantaController.php");

$idPlanta = $_GET["id"];

$plantaCont = new PlantaController();
$planta = $plantaCont->buscarPorId($idPlanta);

if($planta != null) {
    //Deletar o planta
    $plantaCont->excluir($planta);

    //Retornar para a página inicial
    header("location: listPlantas.php");

} else { 
    echo "O planta de ID ".$idPlanta." não existe.";
    echo "<br>";
    echo "<a href='index.php'>Voltar</a>";
}

?>